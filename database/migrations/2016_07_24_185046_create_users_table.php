<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('user_type_id')->unsigned();
            $table->foreign('user_type_id')->references('id')->on('user_types')->onDelete('cascade');
            $table->string('username', '20');
            $table->string('email', '100');
            $table->string('password', '100');
            $table->string('firstname', '20');
            $table->string('lastname', '20');
            $table->string('country', '50');
            $table->string('city', '50');
            $table->string('address', '100');
            $table->string('phone', '20');
            $table->date('last_activity');
            $table->tinyInteger('newsletter');
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
        Schema::drop('users');
    }
}
