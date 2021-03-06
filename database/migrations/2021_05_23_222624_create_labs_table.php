<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('labs', function (Blueprint $table) {
			$table->id();
			$table->string("name");
			$table->string("name_ar");
			$table->string("slug")->unique();
			$table->text("about");
			$table->text("about_ar");
			$table->text('phone_number');
			$table->text('fax_number');
			$table->text('email');
			$table->text('address');
			$table->string("image");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('labs');
	}

}
