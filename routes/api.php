<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::namespace('Api')->prefix('auth')->group(function () {
    Route::post('login', 'RegisterController@login');
    Route::post('register', 'RegisterController@register');
//    Route::post('register-provider', 'RegisterController@registerProvider');
    Route::post('resend-code', 'RegisterController@resendCode');
    Route::post('activate-mobile', 'RegisterController@activateMobile');
    Route::post('forget-password', 'RegisterController@forgetPassword');
    Route::post('reset-password', 'RegisterController@resetPassword');
    Route::post('check-reset-password', 'RegisterController@checkResetPassword');
});

Route::namespace('Api')->middleware(['auth:sanctum'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::post('profile', 'UserController@updateProfile');
        Route::post('notifications/update-firebase', 'NotificationController@updateFirebase');
        Route::get('notifications', 'NotificationController@index');
        Route::get('notifications/{id}/read', 'NotificationController@read');
        Route::get('notifications/read-all', 'NotificationController@markAllAsRead');
        Route::post('change-setting', 'UserController@changeSetting');
        Route::get('profile', 'UserController@profile');
        Route::post('contact-us', 'UserController@contactUs');
        Route::post('activate-new-mobile', 'UserController@activateNewMobile');
        Route::get('logout', 'UserController@logout');

    });
});

Route::namespace('Api')->prefix('customer')->middleware(['auth:sanctum', 'api_user_type:customer'])->group(function () {
    Route::prefix('orders')->group(function () {
        Route::get('', 'OrderController@index');
        Route::get('{id}', 'OrderController@show')->where('id', '[0-9].*');
        Route::any('near-by-provider', 'OrderController@NearByProviders');
        Route::post('store', 'OrderController@store');
        Route::post('{id}/cancel', 'OrderController@cancelOrder');
        Route::post('{id}/pay', 'OrderController@pay');
        Route::post('{id}/rate', 'OrderController@rate');
    });
});

Route::namespace('Api')->prefix('provider')->middleware(['auth:sanctum', 'api_user_type:provider'])->group(function () {
    Route::prefix('orders')->group(function () {
        Route::get('', 'OrderController@index');
        Route::get('{id}', 'OrderController@show');
        Route::post('{id}/cancel', 'ProviderOrderController@cancelOrder');
        Route::get('{id}/approve', 'ProviderOrderController@approve');
        Route::get('{id}/in-way', 'ProviderOrderController@inWay');
        Route::get('{id}/arrive', 'ProviderOrderController@arrive');
        Route::get('{id}/start-check', 'ProviderOrderController@startCheck');
        Route::post('{id}/check', 'ProviderOrderController@check');
        Route::get('{id}/finish', 'ProviderOrderController@finish');
        Route::get('{id}/start-work', 'ProviderOrderController@startWork');
        Route::get('{id}/stop-work', 'ProviderOrderController@stopWork');
        Route::post('{id}/add-bills', 'ProviderOrderController@finishWithBills');
        Route::post('{id}/pay', 'ProviderOrderController@pay');
    });
    Route::post('change-available', 'ProviderOrderController@changeAvailable');
});

Route::get('metadata', 'Api\HomeController@metadata');
Route::get('status', 'Api\HomeController@status');
Route::get('sliders', 'Api\HomeController@sliders');
Route::get('services', 'Api\HomeController@services');
Route::get('areas', 'Api\HomeController@areas');
Route::get('payments-method', 'Api\HomeController@paymentsMethod');
Route::get('cancel-reasons', 'Api\HomeController@cancelReasons');
