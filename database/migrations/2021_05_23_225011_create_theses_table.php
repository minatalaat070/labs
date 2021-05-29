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
			$table->foreignId("lab_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string("title");
			$table->string("title_ar");
			$table->string("slug")->unique();
			$table->string("author");
			$table->string("author_ar");
			$table->text("supervisors");
			$table->text("supervisors_ar");
			$table->text("about");
			$table->text("about_ar");
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
