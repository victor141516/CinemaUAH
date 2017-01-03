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
$app->get('/film/{id}', 'GuestController@showFilmDetailed');
$app->get('/theater', 'GuestController@showFilms');
$app->get('/reservations', 'GuestController@showFilms');

$app->group(['prefix' => 'admin'], function () use ($app) {
    $app->get('add_film', 'AdminController@addFilm');
    $app->get('delete_film/{id}', 'AdminController@deleteFilm');
    $app->post('add_film', 'AdminController@saveFilm');
    $app->get('edit_film/{id}', 'AdminController@editFilm');
    $app->post('edit_film/{id}', 'AdminController@saveFilm');
    $app->get('manage_films', 'AdminController@manageFilms');
    $app->get('manage_theaters', 'AdminController@manageTheaters');
    $app->get('delete_theater/{id}', 'AdminController@deleteTheaters');

    $app->get('add_theater', 'AdminController@addTheater');
    $app->post('add_theater', 'AdminController@saveTheater');
    $app->get('edit_theater/{id}', 'AdminController@editTheater');
    $app->post('edit_theater/{id}', 'AdminController@saveTheater');
    $app->get('manage_theaters', 'AdminController@manageTheaters');

    $app->get('manage_tickets/select_theater', 'AdminController@manageTheatersSelectTheater');
    $app->get('manage_tickets/{theater_id}/select_projection', 'AdminController@manageTheatersSelectProjection');
    $app->get('manage_tickets/{projection_id}/select_seats', 'AdminController@manageTheatersSelectSeats');
});

