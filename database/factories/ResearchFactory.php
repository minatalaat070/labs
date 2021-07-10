<?php

namespace Database\Factories;

use App\Models\Research;
use App\Models\Lab;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResearchFactory extends Factory {

	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Research::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition() {
		$faker_ar = \Faker\Factory::create('ar_SA');
		return [
			'title' => $this->faker->word(),
			'title_ar' => $faker_ar->word(),
			'lab_id' => Lab::factory(),
			'slug' => $this->faker->unique()->slug(),
			'author_name' => $this->faker->name(),
			'author_name_ar' =>$faker_ar->name(),
			'journal' =>$this->faker->word,
			'published_at' => $this->faker->year,
			'about' => $this->faker->paragraph(),
			'about_ar' => $faker_ar->paragraph(),
			'pdf_url' => $this->faker->url()
		];
	}

}
