<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StrategyShortController;
use App\Http\Controllers\StrategyBriefController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\SendEmailController;

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

Route::get('/', [PagesController::class,'index'])->name('home');
Route::get('/about-us', [PagesController::class,'about'])->name('about-us');
Route::get('/our-expertise', [PagesController::class,'expertise'])->name('our-expertise');
Route::get('/contact-us', [PagesController::class,'contact'])->name('contact-us');
Route::get('/terms-and-conditions', [PagesController::class,'terms'])->name('terms-and-conditions');
Route::get('/privacy-policy', [PagesController::class,'privacy'])->name('privacy-policy');
Route::get('/strategy-list', [PagesController::class,'strategyList'])->name('strategy-list');

Route::get('/login', [PagesController::class,'login'])->name('login');
Route::get('/register', [PagesController::class,'register'])->name('register');

Route::post('/displayOTP', [CustomersController::class,'displayOTP'])->name('displayOTP');
Route::post('/display-strategies', [CustomersController::class,'displayStrategies'])->name('display-strategies');
Route::get('/save-customer', [CustomersController::class,'saveCustomer'])->name('save-customer');
Route::post('/checkCustomer', [CustomersController::class,'checkCustomer'])->name('checkCustomer');
Route::get('/user-strategies', [CustomersController::class,'userStrategies'])->name('user-strategies');
Route::get('/display-reset-password', [CustomersController::class, 'displayResetPassword'])->name('display-reset-password');
Route::post('/send-password-link', [CustomersController::class,'sendPasswordLink'])->name('send-password-link');
Route::get('/reset-password/{token}', [CustomersController::class,'resetPassword'])->name('reset-password');
Route::get('/display-change-password', [CustomersController::class,'displayChangePassword'])->name('display-change-password');
Route::post('/change-password', [CustomersController::class,'changePassword'])->name('change-password');
Route::get('/logout', [CustomersController::class,'logout'])->name('logout');

Route::get('/cart', [CartController::class,'cart'])->name('cart');
Route::get('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/delete-from-cart/{id}', [CartController::class,'deleteFromCart'])->name('delete-from-cart');

Route::get('/admin/login', [AdminController::class,'login'])->name('admin-login');
Route::post('/admin/check-admin-user', [AdminController::class,'checkAdminUser'])->name('check-admin-user');
Route::get('/admin/home', [AdminController::class,'home'])->name('admin-home');
Route::get('/admin/strategy-short', [AdminController::class,'strategyShort'])->name('strategy-short');
Route::get('/admin/strategy-brief', [AdminController::class,'strategyBrief'])->name('strategy-brief');

Route::get('/admin/customer', [AdminController::class,'customer'])->name('customer');

Route::get('/admin/updateRole/{id}', [CustomersController::class,'updateRole'])->name('updateRole');

Route::get('/admin/add-strategy-short', [StrategyShortController::class,'addStrategy'])->name('add-strategy-short');
Route::post('/admin/save-strategy-short', [StrategyShortController::class,'saveStrategy'])->name('save-strategy-short');
Route::get('/admin/edit-strategy-short/{id}', [StrategyShortController::class,'editStrategy'])->name('edit-strategy-short');
Route::post('/admin/update-strategy-short', [StrategyShortController::class,'updateStrategy'])->name('update-strategy-short');
Route::get('/admin/delete-strategy-short/{id}', [StrategyShortController::class,'deleteStrategy'])->name('delete-strategy-short');

Route::get('/admin/add-strategy-brief', [StrategyBriefController::class,'addStrategy'])->name('add-strategy-brief');
Route::post('/admin/save-strategy-brief', [StrategyBriefController::class,'saveStrategy'])->name('save-strategy-brief');
Route::get('/admin/edit-strategy-brief/{id}', [StrategyBriefController::class,'editStrategy'])->name('edit-strategy-brief');
Route::post('/admin/update-strategy-brief', [StrategyBriefController::class,'updateStrategy'])->name('update-strategy-brief');
Route::get('/admin/delete-strategy-brief/{id}', [StrategyBriefController::class,'deleteStrategy'])->name('delete-strategy-brief');


Route::get('/file-upload', function () {  
    return view('form');  
});  
Route::post('/forms.store', [FormController::class, 'store'])->name('forms.store');

Route::get('/send-email', [SendEmailController::class, 'index']);
