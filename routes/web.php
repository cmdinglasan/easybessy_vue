<?php

use Illuminate\Support\Facades\Route;

use Inertia\Inertia;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
})->name('welcome');

Route::middleware(['auth:sanctum', 'verified'])->get('/jet-dash', function () {
    return Inertia::render('Dashboard');
})->name('jet-dash');

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {

	Route::get('/pos', [TransactionController::class, 'index'])->name('pos');

	// Route::get('/dashboard/products', function() {
	// 	return Inertia::render('Dashboard/Inventory/Products/Index');
	// })->name('products');

	Route::get('/dashboard', function() {
		return Inertia::render('Dashboard/Index');
	})->name('dashboard');

	/* Dashboard - Products API */
	Route::get('/dashboard/products', [ProductController::class, 'index'])->name('product.index');
	Route::post('/dashboard/products', [ProductController::class, 'store'])->name('product.store');
	Route::get('/pos/cart', [CartController::class, 'index'])->name('cart.index');
	Route::post('/pos/cart', [CartController::class, 'store'])->name('cart.store');
	Route::post('/pos/cart/delete', [CartController::class, 'destroy'])->name('cart.destroy');

	Route::get('api/user', [UserController::class, 'showCurrent'])->name('user.current');

	/* Dashboard - Stocks API */
	Route::get('/dashboard/stocks', [StockController::class, 'index'])->name('stocks.index');
	Route::get('/dashboard/stocks/sort/', [StockController::class, 'sortAll'])->name('stocks.sort.all');
	Route::get('/dashboard/stocks/sort/{id}', [StockController::class, 'sort'])->name('stocks.sort.id');
	Route::post('/dashboard/stocks/transfer', [StockController::class, 'transfer'])->name('stocks.transfer');

});