<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Enrollment
 *
 * @property int $id
 * @property int $user_id
 * @property int $course_id
 * @property int $progress
 * @property string $status
 * @property Carbon|null $enrolled_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Course $course
 * @property User $user
 */
class Enrollment extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'enrollments';

    protected $casts = [
        'user_id' => 'int',
        'course_id' => 'int',
        'progress' => 'int',
        'enrolled_at' => 'datetime',
    ];

    protected $fillable = [
        'user_id',
        'course_id',
        'progress',
        'status',
        'enrolled_at',
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
