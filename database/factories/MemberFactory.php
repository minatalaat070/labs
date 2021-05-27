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
		$faker_ar = \Faker\Factory::create('ar_SA');
		return [
			'name' => $this->faker->word(),
			'name_ar' => $faker_ar->word(),
			'lab_id' => Lab::factory(),
			'user_name' => $this->faker->unique()->userName(),
			'about' => $this->faker->paragraph(),
			'about_ar' => $faker_ar->paragraph(),
			'image' => $this->faker->image(public_path("storage/uploads/images/members"), 640, 480, null,  false),
			'cv_url' => $this->faker->url(),
			'staff_url' => $this->faker->url(),
		];
	}

}
