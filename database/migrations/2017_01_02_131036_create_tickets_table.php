<?php

use Illuminate\Support\Facades\Schema;
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
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('date_time');

            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');

            $table->unsignedInteger('theater_id');
            $table->foreign('theater_id')->references('id')->on('theaters');
            
            $table->unsignedInteger('row');
            $table->unsignedInteger('column');
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
        Schema::drop('tickets');
    }
}
