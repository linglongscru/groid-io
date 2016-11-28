<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@show');

Route::group(['middleware' => 'activation'], function(){
    Route::get('/home', 'HomeController@show');
});

Route::get('/activate/please', function() {
    return view('auth.guest_activate');
});
Route::get('/resendEmail', 'Auth\ActivationController@resendEmail');
Route::get('/activate/{code}', 'Auth\ActivationController@activateAccount');

//////////////////////////////////////////////////////////
// For scraping data from Cannabis Reports. Thanks, folks!
//////////////////////////////////////////////////////////
//Route::get('/scrape-strains', 'Ingestion\CannabisReportsController@scrape');
//Route::get('/scrape-seed-companies-details', 'Ingestion\CannabisReportsController@seedco');
