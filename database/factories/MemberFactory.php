<?php

namespace Database\Factories;

use App\Models\Lab;
use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

class MemberFactory extends Factory {

	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Member::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		return [
			'name' => $this->faker->word(),
			'lab_id' => Lab::factory(),
			'user_name' => $this->faker->unique()->userName,
			'about' => $this->faker->paragraph,
			'image' => $this->faker->url,
			'cv_url' => $this->faker->url,
			'staff_url' => $this->faker->url,
		];
	}

}
