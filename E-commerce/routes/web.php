<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;


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
});


Route::prefix('admin/')->name('admin.')->group(function () {

    Route::get('loginpage', [LoginController::class, 'loginView'])->name('loginpage');
    Route::post('loginuser', [LoginController::class, 'customLogin'])->name('loginuser');
});


Route::prefix('admin/')->name('user.')->middleware('auth')->group(function () {

    Route::get('userview', [LoginController::class, 'userView'])->name('userview');
    Route::get('addcategoryview', [ProductController::class, 'addCategory'])->name('addcategoryview');
    Route::post('storecategory', [ProductController::class, 'storeCategory'])->name('storecategory');
    Route::get('listcategory', [ProductController::class, 'listCategory'])->name('listcategory');
    Route::get('editcategory/{category}', [ProductController::class, 'editCategoryView'])->name('editcategory');
    Route::post('{category}/updatecategory', [ProductController::class, 'updateCategory'])->name('updatecategory');

    Route::get('addproductview', [ProductController::class, 'addProduct'])->name('addproductview');
    Route::post('storeproduct', [ProductController::class, 'storeProduct'])->name('storeproduct');
    Route::get('listproduct', [ProductController::class, 'listProduct'])->name('listproduct');
    Route::get('editproduct/{productid}', [ProductController::class, 'editProductView'])->name('editproduct');
    Route::post('{product}/updateproduct', [ProductController::class, 'updateProduct'])->name('updateproduct');

    Route::get('addorderview', [OrderController::class, 'addOrderView'])->name('addorderview');
    Route::post('storeorder', [OrderController::class, 'storeOrder'])->name('storeorder');
    Route::get('productview/{id}', [OrderController::class, 'productView'])->name('productview');

    Route::post('storeproductorder/{id}', [OrderController::class, 'storeProductOrder'])->name('storeproductorder');
    Route::get('listorders', [OrderController::class, 'listOrders'])->name('listorders');
    Route::get('editorder/{cusid}', [OrderController::class, 'editOrderView'])->name('editorder');
    Route::post('{order}/updateorder', [OrderController::class, 'updateOrder'])->name('updateorder');

    Route::get('{product}/deleteproduct', [OrderController::class, 'destroyProduct'])->name('deleteproduct');
    Route::get('{category}/deletecategory', [ProductController::class, 'destroyCategory'])->name('deletecategory');
    Route::get('{product}/deleteorderproduct', [OrderController::class, 'destroyOrderProduct'])->name('deleteorderproduct');
    Route::get('{order}/deleteorder', [OrderController::class, 'destroyOrder'])->name('deleteorder');
});
