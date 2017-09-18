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

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('tickets','TicketsController@index');

    Route::get('tickets/create','TicketsController@create');

    Route::get('tickets/edit/{id}','TicketsController@edit');

    Route::get('tickets/{id}','TicketsController@show');

    Route::post('tickets','TicketsController@store');

    Route::post('tickets/upload','TicketsController@upload');

    Route::post('tickets/update/{id}','TicketsController@update');

    Route::post('notes','NotesController@store');

    Route::get('notes/hide/{id}','NotesController@hide');

    Route::get('users/{id}','UsersController@show');

    Route::get('projects','ProjectsController@index');

    Route::get('projects/create','ProjectsController@create');

    Route::get('projects/edit/{id}','ProjectsController@edit');

    Route::post('projects/store/{id}','ProjectsController@store');

    Route::get('projects/show/{id}','ProjectsController@show');

    Route::get('milestone','MilestoneController@index');

    Route::get('milestone/create','MilestoneController@create');

    Route::get('milestone/edit/{id}','MilestoneController@edit');

    Route::post('milestone/store/{id}','MilestoneController@store');

    Route::get('milestone/show/{id}','MilestoneController@getShow');

});
