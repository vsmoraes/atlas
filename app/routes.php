<?php

Route::get('/', ['as' => 'home', function() {
    if ( Auth::guest() ) {
        return Redirect::to('index');
    } else {
        return Redirect::to('dashboard');
    }
}]);

/**
 * Routes to authenticated users
 */
Route::group(['before' => 'auth'], function() {
    Route::get('/signOut', ['as' => 'signOut', 'uses' => 'AuthController@signOut']);

    Route::get('/dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@index']);

    Route::resource('accounts', 'AccountsController');
    Route::resource('transactions', 'TransactionsController');
});



/**
 * Routes to unidentified
 */
Route::group(['before' => 'guest'], function() {
    Route::get('/index', ['as' => 'index', 'uses' => 'PagesController@index']);

    Route::get('/signUp', ['as' => 'signUp', 'uses' => 'AuthController@signUp']);
    Route::post('/signUp', ['as' => 'signUn', 'uses' => 'AuthController@register']);
    Route::get('/login', ['as' => 'signIn', 'uses' => 'AuthController@signIn']);
    Route::post('/login', ['as' => 'login', 'uses' => 'AuthController@login']);

});

// General tests
Route::controller('/test', 'TestController');
