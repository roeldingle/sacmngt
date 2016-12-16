<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('departments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->boolean('is_active')->default(1);
        });

        Schema::create('ticket_priority', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->boolean('is_active')->default(1);
        });

        Schema::create('ticket_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->boolean('is_active')->default(1);
        });


        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50);
            $table->integer('department_id')->unsigned()->index();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('priority_id')->unsigned()->index();
            $table->foreign('priority_id')->references('id')->on('ticket_priority')->onDelete('cascade');
            $table->integer('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('ticket_status')->onDelete('cascade');
            $table->string('subject');
            $table->longText('message');
            $table->boolean('is_active')->default(1);
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
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticket_status');
        Schema::dropIfExists('ticket_priority');
        Schema::dropIfExists('departments');
        
        
        
        
    }
}
