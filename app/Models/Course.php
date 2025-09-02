<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_description',
        'description',
        'original_price',
        'discounted_price',
        'discount_percent',
        'difficulty_level',
        'duration',
        'lessons_count',
        'students_count',
        'language',
        'lifetime_access',
        'certificate',
        'support',
        'downloadable_files',
        'rating',
        'reviews_count',
        'category_id',
        'instructor_id',
        'is_published',
    ];

    /**
     * العلاقة مع التصنيفات
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

        /**
     * العلاقة مع المدرب
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * العلاقة مع المدرب
     */
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    /**
     * الطلاب الملتحقين بالدورة (Pivot Table: course_user)
     */
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')
                    ->withTimestamps();
    }

    /**
     * حساب السعر الفعلي لو فيه خصم
     */
    public function getFinalPriceAttribute()
    {
        return $this->discounted_price ?? $this->original_price;
    }

    /**
     * Check if course has discount
     */
    public function getHasDiscountAttribute()
    {
        return !is_null($this->discounted_price) 
            && $this->discounted_price < $this->original_price;
    }
}
