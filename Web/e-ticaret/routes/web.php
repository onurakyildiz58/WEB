<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function (){
   Route::get('dashboard',[FrontendController::class, 'index']);

   Route::get( 'categories',                        [CategoryController::class, 'index']);
   Route::get( 'add_category',                      [CategoryController::class, 'add']);
   Route::post('insert-category',                   [CategoryController::class, 'insert']);
   Route::get( 'edit-cate/{id}',                    [CategoryController::class, 'edit']);
   Route::put( 'update-category/{id}',              [CategoryController::class, 'update']);
   Route::get( 'delete-category/{id}',              [CategoryController::class, 'destroy']);

   Route::get( 'products',                          [ProductController::class, 'index']);
   Route::get( 'add_product',                       [ProductController::class, 'add']);
   Route::post('insert-product',                    [ProductController::class, 'insert']);
   Route::get( 'edit-prod/{id}',                    [ProductController::class, 'edit']);
   Route::put( 'update-product/{id}',               [ProductController::class, 'update']);
   Route::get( 'delete-prod/{id}',                  [ProductController::class, 'destroy']);

});
Route::get('/',                                     [FrontController::class, 'index']);
Route::get('category',                              [FrontController::class, 'category']);
Route::get('view-category/{slug}',                  [FrontController::class, 'viewcategory']);
Route::get('view-category/{cate_slug}/{prod_slug}', [FrontController::class, 'viewproduct']);
Route::post('add-to-cart',                          [CartController::class, 'addProduct']);
Route::post('delete-cart-item',                     [CartController::class, 'deleteCardItem']);
Route::post('update-cart',                          [CartController::class, 'updatecart']);

Route::middleware(['auth'])->group(function (){
    Route::get('cart',                              [CartController::class, 'viewcart']);
    Route::get('wish',                              [WishlistController::class, 'viewwish']);
    Route::get('checkout',                          [CheckoutController::class, 'index']);
    Route::post('place-order',                      [CheckoutController::class, 'placeorder']);
    Route::get('my-orders',                         [UserController::class, 'index']);
    Route::get('view_order/{id}',                   [UserController::class, 'viewOrder']);
});
