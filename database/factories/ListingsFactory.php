<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ListingsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'         =>  fake()->sentence(),
            'tags'          =>  'laravel,php,mysql,java,css',
            'company'       =>  fake()->company(),
            'user_id'       =>  fake()->numberBetween(1,10),
            'location'      =>  fake()->country(),
            'email'         =>  fake()->companyEmail(),
            'website'       =>  fake()->url(),
            'description'   =>  fake()->paragraph(7),
        ];
    }
}
