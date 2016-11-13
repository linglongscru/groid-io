<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register the API routes for your application as
| the routes are automatically authenticated using the API guard and
| loaded automatically by this application's RouteServiceProvider.
|
*/

Route::group([
    'middleware' => 'auth:api'
], function () {
    $api = app('Dingo\Api\Routing\Router');

    $api->version('v1', function($api) {
        $api->group(['namespace' => 'Groid\Http\Controllers'], function($api) {

            // Operational Units
            $api->get('ops', ['as' => 'ops.get', 'uses' => 'OpsController@index']);
            $api->get('ops/{id}', ['as'=>'ops.show', 'uses' => 'OpsController@show']);

            // Stages
            $api->get('stages', ['as' => 'stages.index', 'uses' => 'StagesController@index']);

            //Strains
            $api->get('strains', ['as' => 'strains.index',  'uses' => 'StrainsController@index']);
            $api->get('strains/{id}', ['as' => 'strains.show',  'uses' => 'StrainsController@index']);

            // Plants
            $api->get('plants', ['as' => 'plants.index',  'uses' => 'PlantsController@index']);

            // Data
            $api->get('data', ['as' => 'data.index',  'uses' => 'DataController@index']);
            $api->get('data/{id}', ['as' => 'data.show',  'uses' => 'DataController@show']);
            $api->post('data', ['as' => 'data.create',  'uses' => 'DataController@store']);
            $api->put('data/{id}', ['as' => 'data.update',  'uses' => 'DataController@destroy']);
            $api->delete('data/{id}', ['as' => 'data.delete',  'uses' => 'DataController@destroy']);

            // Users
            $api->get('users/{id}', ['as' => 'user.show',  'uses' => 'UsersController@show']);

            // Journals
            $api->get('journals', ['as' => 'journals.index',  'uses' => 'JournalsController@index']);
            $api->post('journals', ['as' => 'journals.create',  'uses' => 'JournalsController@store']);
            $api->put('journals/{id}', ['as' => 'journals.update',  'uses' => 'JournalsController@update']);
            $api->get('journals/{id}', ['as' => 'journal.show',  'middleware' => [ 'owner:journals'], 'uses' => 'JournalsController@show']);
            $api->delete('journals/{id}', ['as' => 'journals.delete',  'uses' => 'JournalsController@destroy']);


            // Cycles
            $api->get('cycles', ['as' => 'cycles.index',  'uses' => 'CyclesController@index']);
            $api->get('cycles/{id}', ['as' => 'cycles.show',  'uses' => 'CyclesController@show']);
            $api->post('cycles', ['as' => 'cycles.create',  'uses' => 'CyclesController@store']);

            // Teams
            $api->get('team/name', ['as' => 'team.current',  'uses' => 'CyclesController@index']);

        });
    });
});
