<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

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

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Login Member
Route::get('/login', [AuthenticationController::class, 'indexUser'])->name('member.index.login');
Route::get('/register', [AuthenticationController::class, 'registerUser'])->name('member.register');
Route::post('/register', [AuthenticationController::class, 'registerPostUser'])->name('member.register.post');
Route::post('/login', [AuthenticationController::class, 'postUser'])->name('member.post.login');

// Login Admin
Route::group(['prefix' => 'admin/login', 'as' => 'login.', 'middleware' => 'guest'], function () {
    Route::get('/', [AuthenticationController::class, 'indexAdmin'])->name('index.admin');
    Route::post('/', [AuthenticationController::class, 'postAdmin'])->name('post.admin');
});

// Member
Route::group(['prefix' => '/', 'as' => 'member.','middleware' => 'auth:member'], function() {
    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logoutUser'])->name('logout');
});

// ADMIN
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logoutAdmin'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


});

