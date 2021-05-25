<?php

namespace Database\Seeders;

use App\Models\Device;
use App\Models\Event;
use App\Models\Lab;
use App\Models\Member;
use App\Models\Research;
use App\Models\Thesis;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// \App\Models\User::factory(10)->create();
		$lab1 = Lab::factory()->create();
		Device::factory(10)->create(['lab_id' => $lab1->id]);
		Member::factory(10)->create(['lab_id' => $lab1->id]);
		Thesis::factory(10)->create(['lab_id' => $lab1->id]);
		Research::factory(10)->create(['lab_id' => $lab1->id]);
		$lab2 = Lab::factory()->create();
		Device::factory(10)->create(['lab_id' => $lab2->id]);
		Member::factory(10)->create(['lab_id' => $lab2->id]);
		Thesis::factory(10)->create(['lab_id' => $lab2->id]);
		Research::factory(10)->create(['lab_id' => $lab2->id]);
		$lab3 = Lab::factory()->create();
		Device::factory(10)->create(['lab_id' => $lab3->id]);
		Member::factory(10)->create(['lab_id' => $lab3->id]);
		Thesis::factory(10)->create(['lab_id' => $lab3->id]);
		Research::factory(10)->create(['lab_id' => $lab3->id]);
		$lab4 = Lab::factory()->create();
		Device::factory(10)->create(['lab_id' => $lab4->id]);
		Member::factory(10)->create(['lab_id' => $lab4->id]);
		Thesis::factory(10)->create(['lab_id' => $lab4->id]);
		Research::factory(10)->create(['lab_id' => $lab4->id]);
		$lab5 = Lab::factory()->create();
		Device::factory(10)->create(['lab_id' => $lab5->id]);
		Member::factory(10)->create(['lab_id' => $lab5->id]);
		Thesis::factory(10)->create(['lab_id' => $lab5->id]);
		Research::factory(10)->create(['lab_id' => $lab5->id]);
		$lab6 = Lab::factory()->create();
		Device::factory(10)->create(['lab_id' => $lab6->id]);
		Member::factory(10)->create(['lab_id' => $lab6->id]);
		Thesis::factory(10)->create(['lab_id' => $lab6->id]);
		Research::factory(10)->create(['lab_id' => $lab6->id]);
		$lab7 = Lab::factory()->create();Device::factory(10)->create(['lab_id' => $lab1->id]);
		Member::factory(10)->create(['lab_id' => $lab7->id]);
		Thesis::factory(10)->create(['lab_id' => $lab7->id]);
		Research::factory(10)->create(['lab_id' => $lab7->id]);
		Event::factory(20)->create();
		
	}

}
