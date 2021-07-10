<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResearchTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('research', function (Blueprint $table) {
			$table->id();
			$table->foreignId("lab_id")->constrained()->onDelete('cascade')->onUpdate('cascade');
			$table->string("title");
			$table->string("title_ar");
			$table->string("slug")->unique();
			$table->string("author_name");
			$table->string("author_name_ar");
			$table->string("journal");
			$table->year("published_at");
			$table->text("about");
			$table->text("about_ar");
			$table->string("pdf_url");
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('research');
	}

}
