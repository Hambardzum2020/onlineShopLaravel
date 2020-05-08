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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/admin/getUsers', 'AdminController@getUsers');
Route::post('/admin/send', 'AdminController@send');
Route::get('/admin/getProducts', 'AdminController@getProducts');
Route::get('/admin/update/{x}', 'AdminController@updateProd');
Route::get('/admin/delete/{y}', 'AdminController@deleteProd');
Route::post('/admin/block', 'AdminController@block');
