<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 *
 * @property int $id
 * @property int $course_id
 * @property int $user_id
 * @property int $rating
 * @property string|null $comment
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Course $course
 * @property User $user
 */
class Review extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'reviews';

    protected $casts = [
        'course_id' => 'int',
        'user_id' => 'int',
        'rating' => 'int',
    ];

    protected $fillable = [
        'course_id',
        'user_id',
        'rating',
        'comment',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
