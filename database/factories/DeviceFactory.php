<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Device::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
			'lab_id' => Lab::factory(),
			'slug' => $this->faker->unique()->slug(),
			'image' => $this->faker->url,
			'description' => $this->faker->paragraph()
        ];
    }
}
