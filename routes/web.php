<?php

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
    return view('welcome');
});

Route::get('/das1', "das1Controller@das1_show");
Route::get('/das1/home', "das1Controller@das1_home");
Route::get('/signup', "UserController@signup");
Route::post('/register', "UserController@register");
Route::get('/login', "UserController@login");
Route::post('/signin', "UserController@signin");
Route::get('/logout_server',"UserController@logout");
Route::get('/home', 'UserController@show_home');
Route::get("/home", "ProductControllel@show_all_products_in_home");
Route::group(['middleware' => ['checkLogin']], function(){
    Route::get('/profile',"UserController@show_profile");
    Route::get('/edit',"UserController@show_edit");
    Route::post('/edit_server', 'UserController@edit_server');
    Route::get('/addProduct', 'ProductControllel@addProduct');
    Route::post('/addProduct_server', 'ProductControllel@addProduct_server');
    Route::get('/MyProduct', 'ProductControllel@MyProduct');
    Route::post("/delete_prod", 'ProductControllel@delete_prod');
    Route::get("/product/item/{id}", "ProductControllel@item");
    Route::get("/product/edit/{id}", "ProductControllel@show_editProd");
    Route::post("/edit_prod", "ProductControllel@edit_prod");
    Route::post("/delete_photo", "ProductControllel@delete_photo");
    Route::post("/search_product", "ProductControllel@search_product");
    Route::get("/settings", "UserController@changePwd");
    Route::post("/check_current_pwd", "UserController@check_current_pwd");
    Route::post("/updatePwd", "UserController@updatePwd");
    Route::get("/Edit/Products/Photos/{id}", "ProductControllel@show_edit_products_photos");
    Route::get('/profile/{id}',"UserController@show_Userprofile");
    Route::get('/product/cart', 'CartController@show_product_cart');
    Route::post('/addToCart', 'CartController@addToCart');
    Route::get('/product/wishlist', 'WishlistController@show_product_wishlist');
    Route::post('/addToWishlist', 'WishlistController@addToWishlist');
    Route::post('/getCountCartProduct', 'CartController@getCountCartProduct');
    Route::post('/getCountCartProductAll', 'CartController@getCountCartProductAll');
    Route::post('/getCountNotification', 'CartController@getNotification');
    Route::post('/getCountWishProduct', 'WishlistController@getCountWishProduct');
    Route::post('/getCountWishProductAll', 'WishlistController@getCountWishProductAll');
    Route::post('/incrementProductInCart', 'CartController@incrementProductInCart');
    Route::post('/decrementProductInCart', 'CartController@decrementProductInCart');
    Route::get('/cart/checkout', 'StripeController@stripe_show');
    Route::post('stripe', 'StripeController@stripePost')->name('stripe.post');
    Route::get('/orders', 'OrderController@show_orders');
    Route::post('/getOrders', 'OrderController@getOrders');
    Route::get('/orders/{id}', 'OrderController@ordersDetalis');
    Route::post('/orderDetalis', 'OrderDetalisController@show_order_detalis');
    Route::get('/feedback/{id}', 'OrderDetalisController@show_feedback');
    Route::post('/getProductsDataForFeedback', 'OrderDetalisController@getProductsDataForFeedback');
    Route::post('/showFeedBackAll', 'OrderDetalisController@showFeedBackAll');
    Route::post('/saveFeedback', 'OrderDetalisController@save_feedback');
    Route::get('/admin', 'AdminController@show_admin');
    Route::get('/admin/{any}', 'AdminController@show_admin')->where('any', '.*');
    Route::get('/notification', 'MessageController@show_notification');
    Route::post('/getNotification', 'MessageController@getNotification');
});
Route::post('/range', 'ProductControllel@range');
Route::get('/verify/{hash}/{id}', "UserController@verify");
Route::get('/password/recover', 'UserController@forgot_password');
Route::post('/forgotPassword', 'UserController@forgotPassword');
Route::post('/upNewPwd', 'UserController@upNewPwd');

