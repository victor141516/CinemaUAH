<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', 'GuestController@showFilms');
$app->get('/films', 'GuestController@showFilms');
$app->get('/theater', 'GuestController@showFilms');
$app->get('/reservations', 'GuestController@showFilms');

$app->group(['prefix' => 'admin'], function () use ($app) {
    $app->get('add_film', 'AdminController@addFilm');
    $app->get('edit_film/{film_id}', 'AdminController@editFilm');
    $app->get('manage_films', 'AdminController@manageFilms');

    $app->get('add_theater', 'AdminController@addTheater');
});

