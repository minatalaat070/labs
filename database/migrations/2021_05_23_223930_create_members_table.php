<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('members', function (Blueprint $table) {
			$table->id();
			$table->foreignId("lab_id");
			$table->string("name");
			$table->string("name_ar");
			$table->string("user_name")->unique();
			$table->text("about");
			$table->text("about_ar");
			$table->string("image");
			$table->string("cv_url", 2038);
			$table->string("staff_url", 2038);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('members');
	}

}
