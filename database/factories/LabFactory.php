<?php

namespace Database\Factories;

use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

class LabFactory extends Factory {

	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Lab::class;

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
			'slug' => $this->faker->unique()->slug(),
			'phone_number' => $this->faker->phoneNumber, 
			'fax_number' => $this->faker->phoneNumber,
			'email' => $this->faker->email,
			'adress' => $this->faker->address,
			'image' => $this->faker->image(public_path("storage/uploads/images/labs"), 640, 480, null, false),
			'about' => $this->faker->paragraph(),
			'about_ar' => $faker_ar->paragraph(),
		];
	}

}
