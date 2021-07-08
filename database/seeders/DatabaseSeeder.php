<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		//\App\Models\User::factory(10)->create();
		\App\Models\User::factory(1)->create([
			'name' => 'test',
			'email' => 'test@test.com',
			'password' => \Illuminate\Support\Facades\Hash::make('123456')
		]);
		

//		for ($index = 0; $index < 7; $index++) {
//			$lab = Lab::factory()->create();
//			\App\Models\Device::factory(7)->create(['lab_id' => $lab->id]);
//			\App\Models\Member::factory(7)->create(['lab_id' => $lab->id]);
//			\App\Models\Thesis::factory(7)->create(['lab_id' => $lab->id]);
//			\App\Models\Research::factory(7)->create(['lab_id' => $lab->id]);
//			\App\Models\Event::factory(7)->create(['lab_id' => $lab->id]);
//		}
	}

}
