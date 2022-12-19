<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('content.main');
})->name('main');
Route::get('/register', function () {
    return view('content.signup');
})->name('register');
Route::get('/login', function () {
    return view('content.signin');
})->name('login');


Route::get('/profile', [UsersController::class, 'view'])->name('profile');
Route::get('/logout', [UsersController::class, 'logout'])->name('logout');
Route::post('/users', [UsersController::class, 'store'])->name('users.store');
Route::post('/login', [UsersController::class, 'login'])->name('users.login');
Route::delete('/users', [UsersController::class, 'destroy'])->name('users.destroy');
