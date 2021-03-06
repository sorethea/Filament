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

Route::middleware('auth:sanctum')->get('/user', 'UserApiController@getUser');

Route::post('firebase_login','UserApiController@firebaseLogin');




Route::resource('profiles', App\Http\Controllers\API\ProfileAPIController::class);
