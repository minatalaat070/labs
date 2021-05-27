<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

class DeviceFactory extends Factory {

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
	public function definition() {
		$faker_ar = \Faker\Factory::create('ar_SA');
		return [
			'name' => $this->faker->word(),
			'name_ar' => $faker_ar->word(),
			'lab_id' => Lab::factory(),
			'slug' => $this->faker->unique()->slug(),
			'image' => $this->faker->image(public_path("storage/uploads/images/devices"), 640, 480, null, false),
			'description' => $this->faker->paragraph(),
			'description_ar' => $faker_ar->paragraph(),
		];
	}

}
