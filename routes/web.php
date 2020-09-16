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

Route::get('', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/billdesk', function () {
    return view('billdesk');
});

Route::get('/billdesk_response', function () {
    return view('billdesk_response');
});

Route::get('/billdesktest', function () {
    return view('billdesktest');
});

Route::get('razorpay', 'PaymentController@show_products');
Route::post('pay_success', 'PaymentController@pay_success');
Route::get('thank_you', 'PaymentController@thank_you');




