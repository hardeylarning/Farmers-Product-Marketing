<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SessionController;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    return view('landing')
        ->with('products', Product::where('status', 'available')->orderBy('updated_at', 'DESC')->get());
});

Route::get('/dashboard', [CategoryController::class, 'adminDashboard']
    // ->with('products', Product::orderBy('updated_at', 'DESC')->get());
);
//
//Route::get('/', [ProductController::class, 'index']);
//Route::get('/product/create', [ProductController::class, 'create']);
//Route::get('/product', [ProductController::class, 'store']);

Auth::routes(['verify' => true]);

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/category', CategoryController::class);
Route::resource('/product', ProductController::class);
Route::get('/private', [HomeController::class, 'private']);

Route::get('session/get', [SessionController::class, 'accessSessionData']);
Route::get('session/set', [SessionController::class, 'storeSessionData']);
Route::get('session/remove', [SessionController::class, 'deleteSessionData']);

//
Route::match(['post', 'get'],'payment/checkout', [ProductController::class, 'checkout']);

Route::match(['post', 'get'],'/search', [ProductController::class, 'search']);
//
Route::post('/pay', [App\Http\Controllers\PaymentController::class, 'redirectToGateway'])->name('pay');
Route::get('/payment/callback', [App\Http\Controllers\PaymentController::class, 'handleGatewayCallback']);
