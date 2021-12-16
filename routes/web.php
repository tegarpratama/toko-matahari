<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\HomeProdukController;
use App\Http\Controllers\MemberProfileController;
use App\Http\Controllers\MemberPasswordController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CheckoutSuccessController;

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

// Produk
Route::get('/produk', [HomeProdukController::class, 'index'])->name('produk.index');
Route::get('/produk/populer', [HomeProdukController::class, 'populer'])->name('produk.populer');
Route::get('/produk/new', [HomeProdukController::class, 'new'])->name('produk.new');
Route::get('/produk/{id}', [HomeProdukController::class, 'show'])->name('produk.show');

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

    // Profile
    Route::get('/profile', [MemberProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{id}', [MemberProfileController::class, 'update'])->name('profile.update');

    // Password
    Route::get('/password', [MemberPasswordController::class, 'index'])->name('password.index');
    Route::put('/password/{id}', [MemberPasswordController::class, 'update'])->name('password.update');

    // Keranjang
    Route::get('/cart', [KeranjangController::class, 'index'])->name('keranjang.index');
    Route::post('/cart', [KeranjangController::class, 'store'])->name('keranjang.store');
    Route::delete('/cart/{id}', [KeranjangController::class, 'destroy'])->name('keranjang.destroy');

    // Checkout
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');

    // Util
    Route::get('/kota/{id}',[CheckoutController::class, 'get_city']);
    Route::get('/destination={city_destination}&weight={weight}&courier={courier}',[CheckoutController::class, 'get_ongkir']);

    // Checkout Success
    Route::get('/checkout-success',[CheckoutSuccessController::class, 'index'])->name('checkout.success');
});

// ADMIN
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    // Logout
    Route::post('/logout', [AuthenticationController::class, 'logoutAdmin'])->name('logout');

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Produk
    Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('/produk/tambah', [ProdukController::class, 'create'])->name('produk.create');
    Route::get('/produk/{id}/detail', [ProdukController::class, 'show'])->name('produk.show');
    Route::post('/produk', [ProdukController::class, 'store'])->name('produk.store');
    Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
    Route::put('/produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('/produk/{id}', [ProdukController::class, 'destroy'])->name('produk.destroy');

    // Member
    Route::get('/member', [MemberController::class, 'index'])->name('member.index');

    // Pesanan
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pesanan/{id}/detail', [PesananController::class, 'show'])->name('pesanan.show');
    Route::put('/pesanan/{id}', [PesananController::class, 'update'])->name('pesanan.update');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');

    // Password
    Route::get('/password', [PasswordController::class, 'index'])->name('password.index');
    Route::put('/password/{id}', [PasswordController::class, 'update'])->name('password.update');
});

