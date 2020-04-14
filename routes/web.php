<?php

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




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get("/home","Controller@index")->name("home");
Route::get("/category/{category}","CategoryController@getProducts")->name("category");
Route::get("/addToCart/{product}/{QTY}","ShoppingCartController@addToCart")->name("addToCart");

Route::get("/user/history/{user}","Controller@userHistory")->name("userHistory")->middleware("auth");
Route::get("/user/history/{user}/orders","Controller@userHistoryOrders")->name("userHistoryOrders")->middleware("auth");
//admin routes


Route::get("/admin/dashboard","AdminController@dashboard")->name("dashboard")->middleware("admin");

Route::get("/admin/category/{category}/delete","CategoryController@deleteCategory")->name("deleteCategory")->middleware("admin");
Route::get("/admin/category/{category}/update","CategoryController@updateCategory")->name("updateCategory")->middleware("admin");
Route::get("/admin/category/create","CategoryController@createCategory")->name("createCategory")->middleware("admin");


Route::get("/admin/dashboard/products","AdminController@dashboard_products")->name("dashboard_products")->middleware("admin");
Route::get("/admin/dashboard/products/{category}","AdminController@dashboard_products_one")->name("dashboard_products_one")->middleware("admin");


Route::get("/admin/product/{product}/delete","ProductsController@deleteProduct")->name("deleteProduct")->middleware("admin");
Route::get("/admin/product/{product}/update","ProductsController@updateProduct")->name("updateProduct")->middleware("admin");
Route::get("/admin/product/create","ProductsController@createProduct")->name("createProduct")->middleware("admin");
