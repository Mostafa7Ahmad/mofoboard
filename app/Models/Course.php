<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use App\Enums\LevelEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class Course
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property float $price
 * @property string $difficulty_level
 * @property string|null $duration
 * @property int|null $category_id
 * @property int|null $instructor_id
 * @property bool $is_published
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Category|null $category
 * @property User|null $user
 * @property Collection|Enrollment[] $enrollments
 * @property Collection|Module[] $modules
 * @property Collection|Review[] $reviews
 */
class Course extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;

    protected $table = 'courses';

    protected $casts = [
        'price' => 'float',
        'category_id' => 'int',
        'instructor_id' => 'int',
        'is_published' => 'bool',
        'difficulty_level' => LevelEnum::class,
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'price',
        'difficulty_level',
        'duration',
        'category_id',
        'instructor_id',
        'is_published',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
