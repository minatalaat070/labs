<?php

namespace Database\Factories;

use App\Models\Lab;
use App\Models\Thesis;
use Illuminate\Database\Eloquent\Factories\Factory;

class ThesisFactory extends Factory {

	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Thesis::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		$faker_ar = \Faker\Factory::create('ar_SA');
		return [
			'title' => $this->faker->sentence(),
			'title_ar' => $faker_ar->sentence(),
			'lab_id' => Lab::factory(),
			'slug' => $this->faker->unique()->slug(),
			'author' => $this->faker->name(),
			'author_ar' => $faker_ar->name(),
			'supervisors' => $this->faker->name(),
			'supervisors_ar' => $faker_ar->name(),
			'pdf_url' => $this->faker->url(),
			'about' => $this->faker->paragraph(), 
			'about_ar' => $faker_ar->paragraph(),
			'awarded_at' => $this->faker->year
		];
	}

}
