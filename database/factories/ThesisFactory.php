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
		return [
			'title' => $this->faker->sentence,
			'lab_id' => Lab::factory(),
			'slug' => $this->faker->unique()->slug,
			'author' => $this->faker->name,
			'supervisors' => $this->faker->name,
			'pdf_url' => $this->faker->url,
			'about' => $this->faker->paragraph,
			'awarded_at' => $this->faker->dateTime
		];
	}

}
