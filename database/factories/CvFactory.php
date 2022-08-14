<?php

namespace Database\Factories;

use App\Models\Cv;
use App\Models\Job;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CvFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Cv::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'address' => fake()->address(),
            'education' => fake()->slug(),
            'work' => fake()->jobTitle(),
            'experience' => fake()->sentence()
        ];
    }
}
