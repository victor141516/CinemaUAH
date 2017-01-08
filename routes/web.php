<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'GuestController@showFilms');
Route::get('/film/{id}', 'GuestController@showFilmDetailed');
Route::get('/seats/{id}', 'GuestController@showSeatBooking');
Route::get('/theater', 'GuestController@showFilms');
Route::get('/reservations', 'GuestController@showFilms');
Route::post('/book', 'GuestController@bookSeat');
Route::get('/pay', 'GuestController@paySeat');

Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login');
Route::get('auth/logout', 'Auth\LoginController@logout');
Route::get('auth/register', 'Auth\RegisterController@getRegister');
Route::post('auth/register', 'Auth\RegisterController@postRegister');

Route::group(['middleware' => 'auth'], function () {
    Route::post('comment', 'AjaxController@comment');
    Route::post('api/pay/{token}', 'AjaxController@paySeat');
    Route::post('api/change_seat', 'AjaxController@adminChangeSeat');

    Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
        Route::get('/', function() { return redirect('/admin/home'); });
        Route::get('home', 'AdminController@home');
        Route::get('add_film', 'AdminController@addFilm');
        Route::get('delete_film/{id}', 'AdminController@deleteFilm');
        Route::post('add_film', 'AdminController@saveFilm');
        Route::post('placeholder_film', 'AjaxController@placeholderFilm');/////////////////////
        Route::post('film_image', 'AjaxController@editFilmImage');//////////////////////////////
        Route::get('edit_film/{id}', 'AdminController@editFilm');
        Route::post('edit_film/{id}', 'AdminController@saveFilm');
        Route::get('manage_films', 'AdminController@manageFilms');
        Route::get('manage_theaters', 'AdminController@manageTheaters');
        Route::get('delete_theater/{id}', 'AdminController@deleteTheaters');

        Route::get('add_theater', 'AdminController@addTheater');
        Route::post('add_theater', 'AdminController@saveTheater');
        Route::get('edit_theater/{id}', 'AdminController@editTheater');
        Route::post('edit_theater/{id}', 'AdminController@saveTheater');
        Route::get('manage_theaters', 'AdminController@manageTheaters');

        Route::get('manage_projections/{id}', 'AdminController@manageProjections');
        Route::get('delete_projection/{id}', 'AdminController@deleteProjection');
        Route::post('manage_projections/{id}', 'AdminController@saveProjection');

        Route::get('manage_tickets/select_projection', 'AdminController@manageTheatersSelectProjection');
        Route::get('manage_tickets/{projection_id}/select_seats', 'AdminController@manageTheatersSelectSeats');

        Route::get('films_report/{group}', 'AdminController@filmsReport');
        Route::get('theater_report', 'AdminController@theaterReport');
        Route::get('tickets_report/{group}', 'AdminController@ticketsReport');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index');
