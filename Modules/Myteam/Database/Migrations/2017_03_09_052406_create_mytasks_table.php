<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMytasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mytasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('assign_id')->unsigned()->index();
            $table->foreign('assign_id')->references('id')->on('user')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->boolean('is_active');
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
        Schema::dropIfExists('mytasks');
    }
}
