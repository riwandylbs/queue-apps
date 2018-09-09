<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Queues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrian', function (Blueprint $table){
            $table->increments('id');
            $table->integer('loading_dock');
            $table->string('expd_name', 100);
            $table->integer('card_no');
            $table->string('check_in', 100);
            $table->string('check_out', 100);
            $table->dateTime('date_in');
            $table->string('time_start', 50);
            $table->string('time_finish', 50);
            $table->enum('status', ['on progress', 'done', 'ready']);
            $table->string('locations', 50);
            $table->timestamps();
            $table->engine = 'InnoDB'; 	
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
