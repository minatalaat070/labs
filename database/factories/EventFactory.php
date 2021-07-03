<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Lab;
use Faker\Factory as Factory2;
use Illuminate\Database\Eloquent\Factories\Factory;
use function public_path;

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
		$faker_ar = Factory2::create('ar_SA');
		return [
			"name" => $this->faker->word(),
			"name_ar" => $faker_ar->word(),
			'lab_id' => Lab::factory(),
			"slug" => $this->faker->unique()->slug(),
			"image" => $this->faker->image(public_path("storage/uploads/images/events"), 640, 480, null, false),
			"date" => $this->faker->dateTime(),
			"description" => $this->faker->paragraph(),
			"description_ar" => $faker_ar->paragraph(),
		];
	}

}
