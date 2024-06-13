<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Lesson;
class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // for ($i = 1; $i <= 5; $i++) {
        //     Lesson::create([
        //         'CourseChapterId' => 1,
        //         'LessonName' => 'Lesson ' . $i,
        //         'LessonDescription' => 'Description for Lesson ' . $i,
        //         'SortNumber' => $i,
        //         'Status' => rand(0, 1),
        //         'created_at' => now(),
        //         'updated_at' => now(),
        //         'deleted_at' => null,
        //     ]);
        // }
    }
}
