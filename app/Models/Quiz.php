<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Quiz
 *
 * @property int $id
 * @property int|null $lesson_id
 * @property string|null $title
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Lesson|null $lesson
 * @property Collection|Question[] $questions
 */
class Quiz extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'quizzes';

    protected $casts = [
        'lesson_id' => 'int',
    ];

    protected $fillable = [
        'lesson_id',
        'title',
        'description',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
