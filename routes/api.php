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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//register
//login
//logout
//auth-user

Route::prefix('auth')->group(function(){
    //api/auth/register
    Route::post('/register', 'App\Http\Controllers\AuthController@register');
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->middleware('auth:api');
    Route::get('/user', 'App\Http\Controllers\AuthController@user')->middleware('auth:api');
    Route::get('authentication-failed', 'App\Http\Controllers\AuthController@authFailed')->name('auth-failed');

});

//API Resources
//Route::get('opportunities', 'App\Http\Controllers\OpportunityController@index');
//Route::get('opportunity/{opportunity}', 'App\Http\Controllers\OpportunityController@show');


Route::group(['prefix' => 'lookups', 'middleware' => 'auth:api'], function (){
    Route::resource('category', 'App\Http\Controllers\CategoryController');
    Route::resource('country', 'App\Http\Controllers\CountryController');
});

Route::group(['middleware' => 'auth:api'], function (){

    //Opportunities
    Route::resource('opportunity', 'App\Http\Controllers\OpportunityController');

    //Questions
    Route::get('questions', 'App\Http\Controllers\QuestionController@index');
    Route::post('question', 'App\Http\Controllers\QuestionController@store');
    Route::put('question/{question}', 'App\Http\Controllers\QuestionController@update');

    ///Favorites
    Route::get('favorites', 'App\Http\Controllers\FavoriteController@index');
    Route::post('favorite', 'App\Http\Controllers\FavoriteController@store');
    Route::put('favorite/{favorite}', 'App\Http\Controllers\FavoriteController@update');

    //ToDo: Upload Images for Opportunities ad Forum

});

