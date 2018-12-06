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

Route::get('/', 'HomeController');

# SHOW
Route::get('/events/{id}', 'EventController@show');
Route::get('/events', 'EventController@index');



# CREATE
Route::get('/events/create', 'EventController@create');
Route::post('/events', 'EventController@store');

#SEARCH
Route::get('/events/search', 'EventController@search');
Route::get('/events/search-process', 'EventController@searchProcess');

# EDIT
# Show the form to edit a specific book
Route::get('/events/{id}/edit', 'EventController@edit');
# Process the form to edit a specific book
Route::put('/events/{id}', 'EventController@update');

# DELETE
# Show the page to confirm deletion of a book
Route::get('/events/{id}/delete', 'EventController@delete');
# Process the deletion of a book
Route::delete('/events/{id}', 'EventController@destroy');

