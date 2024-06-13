<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->integer('UserID');
            $table->string('CourseCode', 255);
            $table->string('CourseName', 255);
            $table->string('CourseSubTitle', 255);
            $table->string('Slug', 255);
            $table->integer('Price');
            $table->double('Discount');
            $table->string('ImageData', 255);
            $table->integer('LessonCount');
            $table->integer('ChapterCount');
            $table->integer('TimeLessonTotal');
            $table->integer('RegisterCount');
            $table->integer('DoneCount');
            $table->boolean('CourseStatus')->default(0);
            $table->string('IntroVideoLink', 255);

            // $table->softDeletes();
            $table->timestamps();
            $table->softDeletes();
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
