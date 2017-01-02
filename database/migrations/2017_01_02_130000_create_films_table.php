<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('synopsis');
            $table->string('website')->nullable();
            $table->string('original_title');
            $table->string('genre');
            $table->string('country');
            $table->unsignedInteger('minutes_duration');
            $table->unsignedInteger('year');
            $table->string('producer');
            $table->string('director');
            $table->string('age_rating');
            $table->string('others');
            $table->boolean('has_image');
            $table->timestamps();
        });

        Schema::create('actors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });


        Schema::create('actor_film', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('film_id');
            $table->foreign('film_id')->references('id')->on('films');

            $table->unsignedInteger('actor_id');
            $table->foreign('actor_id')->references('id')->on('actors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('films_actors');
        Schema::drop('films');
        Schema::drop('actors');
    }
}
