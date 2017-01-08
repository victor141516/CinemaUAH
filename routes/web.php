<?php

Route::get('/', 'GuestController@showFilms');
Route::get('/film/{id}', 'GuestController@showFilmDetailed');
Route::get('/seats/{id}', 'GuestController@showSeatBooking');
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

        //Films
        Route::get('add_film', 'Admin\FilmController@add');
        Route::post('add_film', 'Admin\FilmController@save');
        Route::post('placeholder_film', 'AjaxController@placeholderFilm');
        Route::get('manage_films', 'Admin\FilmController@manage');
        Route::get('edit_film/{id}', 'Admin\FilmController@edit');
        Route::post('edit_film/{id}', 'Admin\FilmController@save');
        Route::get('delete_film/{id}', 'Admin\FilmController@delete');
        Route::post('film_image', 'AjaxController@editFilmImage');
        Route::get('films_report/{group}', 'Admin\FilmController@report');
        
        //Theater
        Route::get('add_theater', 'Admin\TheaterController@add');
        Route::post('add_theater', 'Admin\TheaterController@save');
        Route::get('manage_theaters', 'Admin\TheaterController@manage');
        Route::get('edit_theater/{id}', 'Admin\TheaterController@edit');
        Route::post('edit_theater/{id}', 'Admin\TheaterController@save');
        Route::get('delete_theater/{id}', 'Admin\TheaterController@delete');
        Route::get('theater_report', 'Admin\TheaterController@report');

        //Projections        
        Route::get('manage_projections/{id}', 'Admin\ProjectionController@manage');
        Route::post('manage_projections/{id}', 'Admin\ProjectionController@save');
        Route::get('delete_projection/{id}', 'Admin\ProjectionController@delete');

        //Tickets
        Route::get('manage_tickets', 'Admin\TicketController@manage');
        Route::get('manage_tickets/{projection_id}', 'Admin\TicketController@seats');
        Route::get('tickets_report/{group}', 'Admin\TicketController@report');
    });
});
Auth::routes();

Route::get('/home', 'HomeController@index');
