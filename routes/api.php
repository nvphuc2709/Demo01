<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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
Route::group(['prefix' => '/posts', 'as' => 'posts.'], function () {
    Route::get('/', [PostController::class,'index']);
    Route::post('post/', [PostController::class,'store']);
    Route::get('show/{id}', [PostController::class,'show']);
    Route::put('update/{id}', [PostController::class,'update']);
    Route::delete('delete/{id}', [PostController::class,'destroy']);
});