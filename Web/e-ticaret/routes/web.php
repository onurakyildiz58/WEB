<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Frontend\FrontController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\UserController;
use App\Http\Controllers\Frontend\RatingController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
   Route::get('dashboard',                          [FrontendController::class, 'index']);

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

   Route::get('orders',                             [OrderController::class, 'orders']);
   Route::get('admin/view_order/{id}',              [OrderController::class, 'view']);
   Route::put('update-order/{id}',                  [OrderController::class, 'updateOrder']);
   Route::get('order-history',                      [OrderController::class, 'orderHistory']);

   Route::get('users',                              [DashboardController::class, 'users']);
   Route::get('view-user/{id}',                     [DashboardController::class, 'viewUser']);
});

Route::get('/',                                     [FrontController::class, 'index']);
Route::get('category',                              [FrontController::class, 'category']);
Route::get('view-category/{slug}',                  [FrontController::class, 'viewcategory']);
Route::get('view-category/{cate_slug}/{prod_slug}', [FrontController::class, 'viewproduct']);
Route::get('product-list',                          [FrontController::class, 'searchProd']);
Route::post('search-product',                       [FrontController::class, 'products']);

Route::post('add-to-cart',                          [CartController::class, 'addProduct']);
Route::post('delete-cart-item',                     [CartController::class, 'deleteCardItem']);
Route::post('update-cart',                          [CartController::class, 'updatecart']);
Route::get('load-cart-data',                        [CartController::class, 'countCartItems']);

Route::post('add-to-wishlist',                      [WishlistController::class, 'addWish']);
Route::post('remove-from-wishlist',                 [WishlistController::class, 'removeWish']);
Route::get('load-wishlist-data',                    [WishlistController::class, 'countWishListItems']);
Route::get('load-money',                            [WishlistController::class, 'load_money']);
//Route::post('check-email',                           [ForgotPasswordController::class, 'checkEmail']);


Route::middleware(['auth'])->group(function (){
    Route::get('cart',                              [CartController::class, 'viewcart']);

    Route::get('wishlist',                          [WishlistController::class, 'viewwish']);

    Route::get('checkout',                          [CheckoutController::class, 'index']);
    Route::post('place-order',                      [CheckoutController::class, 'placeorder']);

    Route::get('my-orders',                         [UserController::class, 'index']);
    Route::get('view_order/{id}',                   [UserController::class, 'viewOrder']);
    Route::get('delete_order/{id}/{money}',         [UserController::class, 'deleteOrder']);
    Route::get('add-money',                         [UserController::class, 'addMoney']);
    Route::get('my-profil',                         [UserController::class, 'profil']);
    Route::get('update_user',                       [UserController::class, 'updateUserView']);
    Route::post('update_user_info',                 [UserController::class, 'updateUser']);
    Route::post('save_card',                        [WishlistController::class, 'saveCard']);

    Route::post('rating',                           [RatingController::class, 'starsRating']);
    Route::get('addComment/{slug}/user_comments',   [ReviewController::class, 'review']);
    Route::post('add-review',                       [ReviewController::class, 'addReview']);
    Route::get('edit-review/{slug}/userreview',     [ReviewController::class, 'editReview']);
    Route::put('edit-review',                       [ReviewController::class, 'updateReview']);
});
