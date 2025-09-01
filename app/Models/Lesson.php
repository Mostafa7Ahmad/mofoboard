<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Lesson
 *
 * @property int $id
 * @property int $module_id
 * @property string $title
 * @property int|null $duration_minutes
 * @property string $type
 * @property string|null $content
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Module $module
 * @property Collection|Quiz[] $quizzes
 */
class Lesson extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'lessons';

    protected $casts = [
        'module_id' => 'int',
        'duration_minutes' => 'int',
        'order' => 'int',
    ];

    protected $fillable = [
        'module_id',
        'title',
        'duration_minutes',
        'type',
        'content',
        'order',
    ];

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
