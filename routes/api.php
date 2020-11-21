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

Route::get('/permissions','PermissionController@index');
Route::post('/permission/create','PermissionController@create');
Route::post('/permission/edit/{id}','PermissionController@edit');
Route::delete('/permission/delete/{id}','PermissionController@delete');


Route::get('/subPermissions','SubPermissionController@index');
Route::post('/subPermission/create','SubPermissionController@create');
Route::post('/subPermission/edit/{id}','SubPermissionController@edit');
Route::delete('/subPermission/delete/{id}','SubPermissionController@delete');





