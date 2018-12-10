<?php

Route::get('/debug', function () {
    $debug = [
        'Environment' => App::environment(),
        'Database defaultStringLength' => Illuminate\Database\Schema\Builder::$defaultStringLength,
    ];
    /*
    The following commented out line will print your MySQL credentials.
    Uncomment this line only if you're facing difficulties connecting to the
    database and you need to confirm your credentials. When you're done
    debugging, comment it back out so you don't accidentally leave it
    running on your production server, making your credentials public.
    */
    #$debug['MySQL connection config'] = config('database.connections.mysql');
    try {
        $databases = DB::select('SHOW DATABASES;');
        $debug['Database connection test'] = 'PASSED';
        $debug['Databases'] = array_column($databases, 'Database');
    } catch (Exception $e) {
        $debug['Database connection test'] = 'FAILED: '.$e->getMessage();
    }
    dump($debug);
});

Route::get('/', 'HomeController');


# CREATE
Route::get('/events/create', 'EventController@create');
Route::post('/events', 'EventController@store');

#SEARCH
Route::get('/events/search', 'EventController@search');
Route::get('/events/search-process', 'EventController@searchProcess');

# SHOW
Route::get('/events/{id}', 'EventController@show');
Route::get('/events', 'EventController@index');

#LOGIN
Route::get('/events/login', 'EventController@login');



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

