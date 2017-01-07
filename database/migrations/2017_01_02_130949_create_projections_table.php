<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projections', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');

            $table->unsignedInteger('theater_id');
            $table->foreign('theater_id')->references('id')->on('theaters');

            $table->datetime('begin');
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
        Schema::drop('projections');
    }
}
