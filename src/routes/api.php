<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routesmembers
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['middleware' => 'api'], function(){
//     Route::get('posts', 'App\Http\Controllers\Api\PostController@index');
// });

Route::group(['middleware' => 'api'], function(){
    Route::get('members', 'App\Http\Controllers\Api\MemberController@index');
    Route::post('member/create', 'App\Http\Controllers\Api\MemberController@create');
    Route::post('edit', 'App\Http\Controllers\Api\MemberController@edit');
    Route::post('update', 'App\Http\Controllers\Api\MemberController@update');
    Route::post('delete', 'App\Http\Controllers\Api\MemberController@delete');
    Route::get('memberClasses', 'App\Http\Controllers\Api\MemberClassController@index');
    Route::get('memberStatuses', 'App\Http\Controllers\Api\MemberStatusController@index');

});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
