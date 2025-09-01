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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('rating')->unsigned()->default(5); // 1-5
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->unique(['course_id', 'user_id']); // نفس المستخدم ميفهمش يكتب اكتر من تقييم واحد (لو عايز تسمح بتعدد التقييمات شيل الـ unique)
            $table->foreign('course_id')->references('id')->on('courses')->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
