<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StrategyShortController;
use App\Http\Controllers\StrategyBriefController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OffersController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\SendEmailController;
use App\Http\Controllers\SMSController;

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
Route::get('/login', [PagesController::class,'login'])->name('login');
Route::get('/register', [PagesController::class,'register'])->name('register');
Route::get('/pricing', [PagesController::class,'pricing'])->name('pricing');

Route::post('/displayOTP', [CustomersController::class,'displayOTP'])->name('displayOTP');
Route::post('/verify-otp', [CustomersController::class,'verifyOtp'])->name('verify-otp');
Route::get('/save-plan/{id}', [CustomersController::class,'savePlan'])->name('save-plan');
Route::get('/save-customer', [CustomersController::class,'saveCustomer'])->name('save-customer');
Route::post('/checkCustomer', [CustomersController::class,'checkCustomer'])->name('checkCustomer');
Route::get('/user-strategies', [CustomersController::class,'userStrategies'])->name('user-strategies');
Route::get('/display-reset-password', [CustomersController::class, 'displayResetPassword'])->name('display-reset-password');
Route::post('/send-password-link', [CustomersController::class,'sendPasswordLink'])->name('send-password-link');
Route::get('/reset-password/{token}', [CustomersController::class,'resetPassword'])->name('reset-password');
Route::get('/display-change-password', [CustomersController::class,'displayChangePassword'])->name('display-change-password');
Route::post('/change-password', [CustomersController::class,'changePassword'])->name('change-password');
Route::get('/profile', [CustomersController::class,'profile'])->name('profile');
Route::post('/update-details/{column}', [CustomersController::class,'updateDetails'])->name('update-details');
Route::post('/verify-email', [CustomersController::class,'verifyEmail'])->name('verify-email');
Route::post('/verify-email-otp', [CustomersController::class,'verifyEmailOtp'])->name('verify-email-otp');
Route::post('/verify-mobile', [CustomersController::class,'verifyMobile'])->name('verify-mobile');
Route::post('/verify-mobile-otp', [CustomersController::class,'verifyMobileOtp'])->name('verify-mobile-otp');
Route::post("/change-photo", [CustomersController::class,'changePhoto'])->name('change-photo');
Route::get("/delete-photo", [CustomersController::class,'deletePhoto'])->name('delete-photo');
Route::get('/logout', [CustomersController::class,'logout'])->name('logout');

Route::get('/strategy-list', [CartController::class,'strategyList'])->name('strategy-list');
Route::get('/cart', [CartController::class,'cart'])->name('cart');
Route::get('/save-strategies', [CartController::class,'saveStrategies'])->name('save-strategies');
Route::get('/add-to-cart/{id}', [CartController::class,'addToCart'])->name('add-to-cart');
Route::get('/delete-from-cart/{id}', [CartController::class,'deleteFromCart'])->name('delete-from-cart');

Route::get('/admin/login', [AdminController::class,'login'])->name('admin-login');
Route::post('/admin/check-admin-user', [AdminController::class,'checkAdminUser'])->name('check-admin-user');
Route::get('/admin/home', [AdminController::class,'home'])->name('admin-home');
Route::get('/admin/strategy-short', [AdminController::class,'strategyShort'])->name('strategy-short');
Route::get('/admin/strategy-brief', [AdminController::class,'strategyBrief'])->name('strategy-brief');
Route::get('/admin/customer', [AdminController::class,'customer'])->name('customer');
Route::get('/admin/offers', [AdminController::class,'offers'])->name('offers');
Route::get('/admin/coupons', [AdminController::class,'coupons'])->name('coupons');
Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin-logout');

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

Route::get('/admin/add-offer', [OffersController::class,'addOffer'])->name('add-offer');
Route::post('/admin/save-offer', [OffersController::class,'saveOffer'])->name('save-offer');
Route::get('/admin/edit-offer/{id}', [OffersController::class,'editOffer'])->name('edit-offer');
Route::post('/admin/update-offer', [OffersController::class,'updateOffer'])->name('update-offer');
Route::get('/admin/delete-offer/{id}', [OffersController::class,'deleteOffer'])->name('delete-offer');

Route::get('/admin/add-coupon', [CouponsController::class,'addCoupon'])->name('add-coupon');
Route::post('/admin/save-coupon', [CouponsController::class,'saveCoupon'])->name('save-coupon');
Route::get('/admin/edit-coupon/{id}', [CouponsController::class,'editCoupon'])->name('edit-coupon');
Route::post('/admin/update-coupon', [CouponsController::class,'updateCoupon'])->name('update-coupon');
Route::get('/admin/delete-coupon/{id}', [CouponsController::class,'deleteCoupon'])->name('delete-coupon');

Route::get('/send-email', [SendEmailController::class, 'index']);
Route::get('/sms', [SMSController::class, 'sendSMS']);
