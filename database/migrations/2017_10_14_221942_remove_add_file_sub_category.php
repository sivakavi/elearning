<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemoveAddFileSubCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('view_reports', function($table) {
            
            $table->integer('sub_category_file_id')->unsigned();
            $table->foreign('sub_category_file_id')->references('id')->on('sub_category_files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('view_reports', function($table) {
            $table->dropColumn('sub_category_file_id');
        });
    }
}
