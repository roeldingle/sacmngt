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

        

        /*init miscellaneous create tables*/
        self::creteTicketTables();

        /*init support create tables*/
        self::createSupportTables();
        
        /*init miscellaneous create tables*/
        self::createMiscellaneousTables();

        

    }

    public function createSupportTables(){

         Schema::create('support_activity', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned()->nullable()->index();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('status_id')->unsigned()->nullable()->index();
            $table->foreign('status_id')->references('id')->on('ticket_status')->onDelete('cascade');
            $table->timestamps();
        });

    }

    public function creteTicketTables(){

        Schema::create('ticket_category', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id')->unsigned()->nullable()->index();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->string('severity_level');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

        // Schema::create('ticket_priority', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('description');
        //     $table->boolean('is_active')->default(1);
        // });

        Schema::create('ticket_status', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('label_class');
            $table->boolean('is_active')->default(1);
        });


        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code',50);
            $table->integer('department_id')->unsigned()->index();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->nullable()->index();
            $table->foreign('category_id')->references('id')->on('ticket_category')->onDelete('cascade');
            // $table->integer('priority_id')->unsigned()->index();
            // $table->foreign('priority_id')->references('id')->on('ticket_priority')->onDelete('cascade');
            $table->integer('status_id')->unsigned()->index();
            $table->foreign('status_id')->references('id')->on('ticket_status')->onDelete('cascade');
            $table->string('subject');
            $table->longText('message');
            $table->integer('staff_filed')->default(0);
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function createMiscellaneousTables(){

         Schema::create('replies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ticket_id')->unsigned()->index();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->longText('message');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });

         Schema::create('attachments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ticket_id')->unsigned()->nullable()->index();
            $table->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $table->integer('reply_id')->unsigned()->nullable()->index();
            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
            $table->string('name');
            $table->string('path');
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

        /*delete miscellaneous tables*/
        Schema::dropIfExists('attachments');
        Schema::dropIfExists('replies');

        /*delete tickets tables*/
        Schema::dropIfExists('tickets');
        Schema::dropIfExists('ticket_category');
        Schema::dropIfExists('ticket_status');
        Schema::dropIfExists('ticket_priority');

        /*delete support tables*/
        Schema::dropIfExists('support_activity');
        
    }
}
