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

Auth::routes();

Route::prefix('cms')->group(function () {

    Route::middleware('adminGuest')->group(function () {

        Route::get('/login', 'Back\LoginController@showLoginForm')->name('admin.login');

        Route::post('/login', 'Back\LoginController@login');

    });

    Route::middleware('admin')->group(function () {

        Route::post('/logout', 'Back\LoginController@logout')->name('admin.logout');

        Route::get('/edit-profile', 'Back\ProfileController@editProfile')->name('admin.profile.edit');

        Route::patch('/edit-profile', 'Back\ProfileController@updateProfile')->name('admin.profile.update');

        Route::get('/change-password', 'Back\ProfileController@changePassword')->name('admin.password.edit');

        Route::patch('/change-password', 'Back\ProfileController@updatePassword')->name('admin.password.update');


        Route::get('/', 'Back\HomeController@index')->name('admin.home');

        Route::middleware('typeAdmin')->group(function () {

            Route::resource('/admins', 'Back\AdminsController');

        });

        Route::resource('/users', 'Back\UsersController');

        Route::resource('/reviews', 'Back\ReviewsController');

        Route::resource('/categories', 'Back\CategoriesController');

        Route::resource('/products', 'Back\ProductsController');

        Route::resource('/orders', 'Back\OrdersController');

        Route::get('/get-slug/{name}', function ($name) {
            $result = [
                'slug' => Str::slug($name)
            ];

            return response()->json($result);
        });
    });
});

Route::get('/category/{category}', 'Front\CategoryController@show')->name('front.category');

Route::get('/product/{product}', 'Front\ProductController@show')->name('front.product');

Route::post('/product/{product}/review', 'Front\ProductController@storeReview')->name('front.review')->middleware('auth');

Route::get('/user/order/{order}/cancel', 'Front\UserController@cancelOrder')->name('user.order.cancel')->middleware('auth');

Route::get('/user/review/{review}/edit', 'Front\UserController@editReview')->name('user.review.edit')->middleware('auth');

Route::post('/user/review/{review}/update', 'Front\UserController@updateReview')->name('user.review.update')->middleware('auth');

Route::get('/user/review/{review}/delete', 'Front\UserController@deleteReview')->name('user.review.delete')->middleware('auth');

Route::get('/user', 'Front\UserController@index')->name('user.index')->middleware('auth');

Route::get('/cart/add/{product}/{price}/{qty?}', 'Front\CartController@add');

Route::get('/cart/remove/{product}', 'Front\CartController@remove')->name('front.cart.remove');

Route::patch('/cart/update', 'Front\CartController@update')->name('front.cart.update');

Route::get('/cart/details', 'Front\CartController@details');

Route::get('/cart', 'Front\CartController@index')->name('front.cart');

Route::get('/cart/checkout', 'Front\CartController@checkout')->name('front.checkout')->middleware('auth');

Route::get('/search','Front\SearchController@index')->name('front.search');

Route::get('/', 'Front\HomeController@index');





