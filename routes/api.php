<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::get('refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', 'AuthController@user');
        Route::post('logout', 'AuthController@logout');
    });
});

Route::group(['middleware' => 'auth:api'], function(){
    // Users
    Route::get('users', 'UserController@index')->middleware('isAdmin');
    Route::get('users/{id}', 'UserController@show')->middleware('isAdminOrSelf');
});
Route::put('/users/{id}', 'UserController@changeRole');

Route::prefix('change')->group(function () {
    Route::put('patient/{id}', 'UserController@changeRolePatientOnDoctor');
    Route::put('doctor/{id}', 'UserController@changeRoleDoctorOnPatient');
});

Route::prefix('news')->group(function () {
    Route::get('list', 'NewsController@show');
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('create', 'NewsController@create');
        Route::delete('delete/{id}', 'NewsController@delete');
    });
});
Route::get('newsItem/{id}', 'NewsController@item');

Route::prefix('query')->group(function () {
    Route::prefix('list')->group(function() {
        Route::get('directions', 'QueriesController@showDirections');
        Route::get('doctor', 'QueriesController@showDoctors');
        Route::get('queries', 'QueriesController@showQueries');
    });
    Route::post('add', 'QueriesController@add');
});
Route::get('directions', 'DirectionController@show');
