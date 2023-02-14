<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdaptationRequestsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('adaptation_requests', function (Blueprint $table) {
			$table->bigIncrements('request_id');
			$table->string('email');
			$table->string('phone')->nullable();
			$table->integer('animal_id');
			$table->timestamps();

			$table->unique(['email', 'animal_id']);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('adaptation_requests');
	}
}
