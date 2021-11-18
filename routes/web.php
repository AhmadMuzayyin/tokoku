<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    Dashboard,
    CategoryController,
    ProductController,
    UserController,
    TransactionController,
    SettingController
};
use Illuminate\Auth\Middleware\Authenticate;
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

Route::get('/', [AuthController::class, 'index'])->name("login");
Route::post('/auth', [AuthController::class, 'Auth']);

Route::middleware([Authenticate::class])->group(function(){
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::resources([
    '/dashboard' => Dashboard::class,
    '/product' => ProductController::class,
    '/category' => CategoryController::class,
    '/transaction' => TransactionController::class,
    '/setting' => SettingController::class,
    ]);
    Route::get('product/{product}', [ProductController::class, 'destroy']);
    Route::get('produk', [ProductController::class, 'validasi'])->name("product.validasi");
    Route::get('get-product', [TransactionController::class, 'getProduct'])->name('get.product');
});

