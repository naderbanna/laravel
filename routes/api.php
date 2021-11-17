<?php

use App\Models\myUser;
use App\Http\Controllers\UserApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', [UserApiController::class, 'index']);

//TODO: make check for unique email
Route::post('/users/create', [UserApiController::class, 'create']);

//TODO: modify to allow minimum of 1 field to update, instead of requiring all
Route::post('users/update/{user}', [UserApiController::class, 'update']);

Route::delete('/users/delete/{user}', [UserApiController::class, 'delete']);
