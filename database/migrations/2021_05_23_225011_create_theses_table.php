<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThesesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('theses', function (Blueprint $table) {
			$table->id();
			$table->foreignId("lab_id");
			$table->string("title");
			$table->string("slug")->unique();
			$table->string("author");
			$table->text("supervisors");
			$table->text("about");
			$table->string("pdf_url");
			$table->timestamp("awarded_at");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('theses');
	}

}
