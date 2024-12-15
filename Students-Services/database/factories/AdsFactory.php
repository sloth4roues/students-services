<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ads;

class AdsFactory extends Factory
{
    protected $model = Ads::class;

    public function definition()
    {
        return [
            'users_id' => 1,
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'creation_date' => now(),
        ];
    }
}
