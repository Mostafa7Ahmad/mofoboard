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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id');
            $table->string('title');
            // مدة الدرس بالدقائق
            $table->integer('duration_minutes')->nullable();
            // type: video, article, quiz, pdf, etc.
            $table->string('type')->default('video');
            // محتوى مختصر أو رابط الفيديو أو مسار الملف
            $table->text('content')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->foreign('module_id')->references('id')->on('modules')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
