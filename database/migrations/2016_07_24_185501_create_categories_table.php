<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cate_name', 100);
            $table->string('cate_description', 200);
            $table->string('cate_image', 200);
            $table->tinyInteger('parent_category');
            $table->tinyInteger('show_on_homepage');
            $table->tinyInteger('include_on_top_menu');
            $table->tinyInteger('position');
            $table->tinyInteger('status')->default(1);
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
        Schema::drop('categories');
    }
}
