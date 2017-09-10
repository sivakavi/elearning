<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('colleges', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->text('address');
            $table->bigInteger('phno');
            $table->string('contact_person');
            $table->bigInteger('contact_person_phno');
            $table->string('website');
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
		Schema::drop('colleges');
	}

}
