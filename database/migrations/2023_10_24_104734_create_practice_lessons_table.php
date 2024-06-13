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
        Schema::create('practice_lessons', function (Blueprint $table) {
            $table->id();
            $table->text('Problem');
            $table->text('ProblemDetail');
            $table->text('Explain');
            $table->text('Suggest');
            $table->integer('LessonID');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('practice_lessons');
    }
};
