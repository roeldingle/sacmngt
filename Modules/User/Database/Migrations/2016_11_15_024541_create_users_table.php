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
            $table->integer('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->boolean('is_active');
            $table->rememberToken();
            $table->timestamps();
        });


        /*create meta user pivot*/
        Schema::create('meta_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->nullable()->unsigned()->index();
            $table->foreign('team_id')->references('id')->on('team')->onDelete('cascade');
            $table->integer('job_id')->nullable()->unsigned()->index();
            $table->foreign('job_id')->references('id')->on('job')->onDelete('cascade');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('address');
            $table->string('contact');
            $table->string('avatar');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meta_user');
        Schema::dropIfExists('users');
        Schema::dropIfExists('departments');
        
    }
}
