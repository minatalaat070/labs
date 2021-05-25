<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('devices', function (Blueprint $table) {
			$table->id();
			$table->foreignId("lab_id");
			$table->string("name");
			$table->string("slug")->unique();
			$table->string("image");
			$table->text("description");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('devices');
	}

}
