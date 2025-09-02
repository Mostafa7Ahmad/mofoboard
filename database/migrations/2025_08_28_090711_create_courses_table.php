<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();

            // بيانات أساسية
            $table->string('title'); // عنوان الدورة
            $table->string('slug')->unique(); // رابط مميز
            $table->text('short_description')->nullable(); // وصف قصير
            $table->longText('description')->nullable(); // وصف كامل

            // الأسعار
            $table->decimal('original_price', 10, 2)->nullable(); // السعر الأصلي
            $table->decimal('discounted_price', 10, 2)->nullable(); // السعر بعد الخصم
            $table->unsignedTinyInteger('discount_percent')->nullable(); // نسبة الخصم

            // تفاصيل الدورة
            $table->enum('difficulty_level', ['beginner', 'intermediate', 'advanced'])->default('beginner'); // المستوى
            $table->string('duration')->nullable(); // المدة (مثلاً: 12 ساعة)
            $table->integer('lessons_count')->default(0); // عدد الدروس
            $table->integer('students_count')->default(0); // عدد الطلاب
            $table->string('language')->default('العربية'); // لغة الدورة

            // مزايا إضافية
            $table->boolean('lifetime_access')->default(true); // وصول مدى الحياة
            $table->boolean('certificate')->default(true); // شهادة إتمام
            $table->boolean('support')->default(true); // دعم فني
            $table->boolean('downloadable_files')->default(false); // ملفات قابلة للتحميل

            // تقييم
            $table->decimal('rating', 3, 2)->default(0); // التقييم (مثلاً: 4.8)
            $table->integer('reviews_count')->default(0); // عدد التقييمات

            // العلاقات
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();

            $table->unsignedBigInteger('instructor_id')->nullable();
            $table->foreign('instructor_id')->references('id')->on('users')->nullOnDelete();

            // حالة النشر
            $table->boolean('is_published')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
