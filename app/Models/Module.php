<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Module
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 * @property string|null $description
 * @property int $order
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Course $course
 * @property Collection|Lesson[] $lessons
 */
class Module extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'modules';

    protected $casts = [
        'course_id' => 'int',
        'order' => 'int',
    ];

    protected $fillable = [
        'course_id',
        'title',
        'description',
        'order',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
