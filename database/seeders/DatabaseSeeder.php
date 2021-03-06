<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Event;
use App\Models\Lab;
use App\Models\Member;
use App\Models\Research;
use App\Models\Thesis;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		//\App\Models\User::factory(10)->create();
		//User::factory(1)->create([
		//	'name' => 'Hussein',
		//	'email' => 'hus49@hotmail.com',
		//	'password' => Hash::make('123456')
		//]);
		

		for ($index = 0; $index < 7; $index++) {
			$lab = Lab::factory()->create();
			Device::factory(7)->create(['lab_id' => $lab->id]);
			Member::factory(7)->create(['lab_id' => $lab->id]);
			Thesis::factory(7)->create(['lab_id' => $lab->id]);
			Research::factory(7)->create(['lab_id' => $lab->id]);
			Event::factory(7)->create(['lab_id' => $lab->id]);
		}
	}

}
