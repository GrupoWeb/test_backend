<?php

use Illuminate\Http\Request;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::put('credential','backendServer@unauthenticatedRoute')->name('unauthenticatedRoute');
Route::post('message','backendServer@authenticatedMessage')->name('authenticatedMessage');
Route::get('message/{id}','backendServer@messagefindId')->name('messagefindId');
Route::get('messages/{tags}','backendServer@messagefindTags')->name('messagefindTags');