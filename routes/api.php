<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersControllerAPI;

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

// CRUD operations on Users table
Route::get('/users', [UsersControllerAPI::class, 'index']);
Route::get('/users/{user}', [UsersControllerAPI::class, 'show']);
Route::post('/users', [UsersControllerAPI::class, 'store']);
Route::delete('/users/{user}', [UsersControllerAPI::class, 'destroy']);
Route::put('/users/{user}', [UsersControllerAPI::class, 'update']);
