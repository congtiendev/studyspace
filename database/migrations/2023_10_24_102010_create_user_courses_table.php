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
        Schema::create('user_courses', function (Blueprint $table) {
            $table->id();
            $table->integer('UserID');
            $table->integer('CourseID');
            $table->boolean('isDone')->default(false);
            $table->dateTime('RegisterTime');
            $table->double('GrandTotal');
            $table->dateTime('LastTimeStudy');
            $table->double('DonePercent');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_courses');
    }
};
