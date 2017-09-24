<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupSubCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * User and roles relation table
         */
        Schema::create('group_sub_category', function (Blueprint $table) {
            $table->integer('group_id')->unsigned();
            $table->integer('sub_category_id')->unsigned();

            /*
             * Add Foreign/Unique/Index
             */
            $table->foreign('group_id', 'foreign_group')
                ->references('id')
                ->on('groups')
                ->onDelete('cascade');

            $table->foreign('sub_category_id', 'foreign_sub_category')
                ->references('id')
                ->on('sub_categories')
                ->onDelete('cascade');

            $table->unique(['group_id', 'sub_category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_sub_category', function (Blueprint $table) {
            $table->dropForeign('foreign_group');
            $table->dropForeign('foreign_sub_category');
        });

        /*
         * Drop tables
         */
        Schema::dropIfExists('group_sub_category');
    }
}
