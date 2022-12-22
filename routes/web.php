<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Front\FrontuserController;
use App\Http\Controllers\Front\CartController;
use App\Http\Controllers\Front\CheckoutController;
use App\Http\Controllers\Front\WishlistController;
use App\Http\Controllers\Front\UserController;
use App\Http\Controllers\Front\RatingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Clients;
use App\Models\Category;
use App\Models\Products;
use App\Models\Rating;
use App\Models\Cart;
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
//Route::get('/', function () {
   //return view('welcome');
//});
Route::get('/', [FrontuserController::class, 'index']);
Route::get('category', [FrontuserController::class, 'category']);
Route::get('viewcategory/{slug}', [FrontuserController::class, 'viewcategory']);
Route::get('viewproduct/{cate_slug}/{prod_slug}', [FrontuserController::class, 'productview']);
Route::get('product-list', [FrontuserController::class, 'productlistajax']);
Route::post('searchproduct', [FrontuserController::class,'searchProduct']);

Route::post('add-to-cart', [CartController::class, 'add']);
Route::get('/cartview', [CartController::class, 'cartfunction']);
Route::get('delete-cart-item', [CartController::class, 'deleteproduct']);
Route::get('change-total', [CartController::class, 'updatecart']);
Route::get('checkout', [CheckoutController::class, 'index']);
Route::get('place_order', [CheckoutController::class, 'placeorder']);
Route::get('ordersview', [UserController::class, 'index']);
Route::get('view-order/{id}', [UserController::class,'show']);
Route::get('wishlist', [WishlistController::class,'index']);
Route::post('add-to-wishlist', [WishlistController::class,'add']);
Route::post('remove-wishlist-item', [WishlistController::class,'deleteitem']);
Route::get('load-cart-data', [CartController::class, 'cartcount']);
Route::get('load-wishlist-data',[WishlistController::class,'loadwishlist']);
////Route::get('dashboard',[DashboardController::class , 'index']);
//Route::get('dashboard',[DashboardController::class , 'user']);
Route::post('add-rating',[RatingController::class , 'add']);


Route::get('/dashboard', function () {
  return view('front.dashboard');
})->middleware(['front'])->name('dashboard');
require __DIR__.'/front_auth.php';




// Admin routes
Route::get('/admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('admin.dashboard');

require __DIR__.'/auth.php';



Route::namespace('App\Http\Controllers\Admin')->name('admin.')->prefix('admin')
    ->group(function(){
      Route::resource('roles','RoleController');
      Route::resource('permissions','PermissionController');
      Route::resource('users','UserController');
      Route::resource('posts','PostController');
      Route::resource('products','ProductsController');
      Route::resource('category','CategoryController'); 
      Route::resource('orders','OrderController'); 
      Route::resource('frontusers','DashboardController'); 
         
});
