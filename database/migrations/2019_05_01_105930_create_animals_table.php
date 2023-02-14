<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('animal_id');
	        $table->string('name')->unique();
	        $table->unsignedInteger('shelter_id');
	        $table->unsignedInteger('animal_lover_id')->nullable();
	        $table->enum('status', ['adaptable', 'pending', 'adapted']);
	        $table->string('picture')->nullable();
	        $table->text('medical_condition')->nullable();
	        $table->string('race');
	        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
