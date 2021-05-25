<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory {

	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Event::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			"name" => $this->faker->word,
			"slug" => $this->faker->unique()->slug,
			"image" => $this->faker->url,
			"date" => $this->faker->dateTime,
			"description" => $this->faker->paragraph
		];
	}

}
