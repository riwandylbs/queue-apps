<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TempLoadingDock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('temp_loading_dock', function (Blueprint $table)
        {
            $table->increments('id');
            $table->integer('number');
            $table->string('created_by', 100);
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
