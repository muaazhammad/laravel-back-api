<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('tokencheck', 'api\ApiController@checking');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//api routes to login and register
Route::post('login', 'api\ApiController@login');
Route::post('register', 'api\ApiController@register');

//following are the api routes protected by auth.jwt middleware
//only authorized user(having a token) can access to these routes
Route::group(['middleware' => 'auth.jwt'], function () {      

    Route::get('logout', 'api\ApiController@logout');
    Route::get('user', 'api\ApiController@getAuthUser');

    Route::get('products', 'api\productsController@index');
    Route::get('products/{id}', 'api\productsController@show');
    Route::post('products', 'api\productsController@store');
    Route::put('products/{id}', 'api\productsController@update');
    Route::delete('products/{id}', 'api\productsController@destroy');
    Route::get('totalProducts', 'api\productsController@totalProducts');

    Route::get('transactions', 'api\transactionController@index');
    Route::post('transactions', 'api\transactionController@store');
    Route::get('transactions/{id}', 'api\transactionController@show');
    Route::put('transactions/{id}', 'api\transactionController@update');
    Route::delete('transactions/{id}', 'api\transactionController@destroy');
    Route::get('transactionsbymonth/{id}', 'api\transactionController@transactionsByMonth');
    Route::get('totalbymonth/{id}', 'api\transactionController@getTotal');     // for single month
    Route::get('totalPayable', 'api\transactionController@getTotalPayable');   //for all months


    Route::get('suppliers', 'api\supplierController@index');
    Route::get('suppliers/{id}', 'api\supplierController@show');
    Route::post('suppliers/', 'api\supplierController@store');
    Route::put('suppliers/{id}', 'api\supplierController@update');
    Route::delete('suppliers/{id}', 'api\supplierController@destroy');
    Route::get('totalSuppliers', 'api\supplierController@totalSuppliers');

    Route::get('months', 'api\monthsController@index');
    Route::get('months/{id}', 'api\monthsController@show');
    Route::post('months', 'api\monthsController@store');
    Route::put('months/{id}', 'api\monthsController@update');
    Route::delete('months/{id}', 'api\monthsController@destroy');

   
    Route::get('tt', 'api\ApiController@check');
});






















// email verification routes
// i duplicate the routes & controllers, provided by laravel auth for email verification
// and change there responses to json.
//Route::get('email/verify/{id}', 'api\VerificationController@verify')->name('verification.verify');
//Route::get('email/resend', 'api\VerificationController@resend')->name('verification.resend');
//
//
//// api password forgot and reset routes
//// i duplicate the routes & controllers, provided by laravel auth for password forgot/and reset
//// and change there responses to json.
//Route::post('password/email', 'api\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
//Route::post('password/reset', 'api\ResetPasswordController@reset')->name('password.update');
//
//
