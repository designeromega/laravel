<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('courses', function (Blueprint $table) {
			$table->id();
			$table->unsignedBigUnteger('user_id');
			$table->unsignedBigUnteger('category_id');

			$table->string('name');
			$table->string('slug');
			$table->string('image');
			$table->text('descreiption');

			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('category_id')->references('id')->on('category');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('courses');
	}
}
