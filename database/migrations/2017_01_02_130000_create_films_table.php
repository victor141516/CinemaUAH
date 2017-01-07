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
            $table->string('synopsis', 5000)->nullable();
            $table->string('website')->nullable();
            $table->string('original_title')->nullable();
            $table->string('genre')->nullable();
            $table->string('country')->nullable();
            $table->unsignedInteger('minutes_duration')->nullable();
            $table->unsignedInteger('year')->nullable();
            $table->string('producer')->nullable();
            $table->string('director')->nullable();
            $table->string('age_rating')->nullable();
            $table->string('others')->nullable();
            $table->boolean('has_image')->default(false);
            $table->boolean('placeholder')->default(false);
            $table->softDeletes();
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
        Schema::drop('actor_film');
        Schema::drop('films');
        Schema::drop('actors');
    }
}
