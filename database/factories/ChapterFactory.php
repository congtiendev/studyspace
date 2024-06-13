<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Chapter>
 */
class ChapterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Chapter::class;

    public function definition(): array
    {
        return [
            'CourseID' => $this->faker->randomNumber(2),
            'ChapterName' => $this->faker->text(50),
            'ChapterTotalTime' => $this->faker->randomNumber(),
            'ChapterLessonCount' => $this->faker->randomNumber(2),
            'SortNumber' => $this->faker->unique()->randomNumber(2),
        ];
    }
}
