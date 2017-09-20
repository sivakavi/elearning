<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('category_id')->unsigned();
			$table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
			$table->integer('sub_category_id')->unsigned();
			$table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');
			$table->integer('test_id')->unsigned();
            $table->foreign('test_id')->references('id')->on('tests');
            $table->text('question');
            $table->string('image')->nullable();
            $table->string('answer1');
            $table->string('answer2');
            $table->string('answer3');
            $table->string('answer4');
			$table->integer('correct_answer');
			$table->text('description')->nullable();
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
		Schema::drop('questions');
	}

}
