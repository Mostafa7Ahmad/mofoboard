<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Question
 *
 * @property int $id
 * @property int $quiz_id
 * @property string $text
 * @property string $type
 * @property string|null $explanation
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Quiz $quiz
 * @property Collection|Option[] $options
 */
class Question extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'questions';

    protected $casts = [
        'quiz_id' => 'int',
    ];

    protected $fillable = [
        'quiz_id',
        'text',
        'type',
        'explanation',
    ];

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
