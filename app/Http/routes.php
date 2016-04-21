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


$app->get('/', [
    'as' => 'dashboard', 'uses' => 'DashboardController@history'
]);

$app->get('clients', [
    'as' => 'clients.index', 'uses' => 'ClientController@index'
]);


$app->get('tasks', [
    'as' => 'tasks.index', 'uses' => 'TaskController@index'
]);

$app->group(['prefix' => 'yachts'], function () use ($app) {

    $app->get('/', [
        'as' => 'yachts.index', 'uses' => 'App\Http\Controllers\YachtController@index'
    ]);

    $app->get('add', [
        'as' => 'yachts.add', 'uses' => 'App\Http\Controllers\YachtController@add'
    ]);

    $app->post('save', [
        'as' => 'yachts.save', 'uses' => 'App\Http\Controllers\YachtController@save'
    ]);

    $app->get('history/{yacht}', [
        'as' => 'yachts.history', 'uses' => 'App\Http\Controllers\YachtController@history'
    ]);

});


$app->group(['prefix' => 'jobs'], function () use ($app) {

    $app->get('/', [
        'as' => 'jobs.index', 'uses' => 'App\Http\Controllers\JobController@index'
    ]);

    $app->get('add', [
        'as' => 'jobs.add', 'uses' => 'App\Http\Controllers\JobController@add'
    ]);

    $app->post('save', [
        'as' => 'jobs.save', 'uses' => 'App\Http\Controllers\JobController@save'
    ]);

    $app->get('assessment/{job}', [
        'as' => 'jobs.assessment', 'uses' => 'App\Http\Controllers\JobController@assessment'
    ]);

    $app->get('resume/{job}', [
        'as' => 'jobs.resume', 'uses' => 'App\Http\Controllers\JobController@resume'
    ]);

    $app->post('complete', [
        'as' => 'jobs.complete', 'uses' => 'App\Http\Controllers\JobController@complete'
    ]);

    $app->get('review/{job}', [
        'as' => 'jobs.review', 'uses' => 'App\Http\Controllers\JobController@review'
    ]);

    $app->post('handle', [
        'as' => 'jobs.handle', 'uses' => 'App\Http\Controllers\JobController@handle'
    ]);

});
