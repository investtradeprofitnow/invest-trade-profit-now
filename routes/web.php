<?php

use Illuminate\Support\Facades\Route;

use App\Mail\NotifyMail;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StrategyShortController;
use App\Http\Controllers\StrategyBriefController;
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
Route::post('/addCustomer', [CustomersController::class,'addCustomer'])->name('addCustomer');
Route::post('/checkCustomer', [CustomersController::class,'checkCustomer'])->name('checkCustomer');
Route::get('/logout', [CustomersController::class,'logout'])->name('logout');

Route::get('/admin/home', [AdminController::class,'home'])->name('admin-home');
Route::get('/admin/strategy-short', [AdminController::class,'strategyShort'])->name('strategy-short');
Route::get('/admin/strategy-brief', [AdminController::class,'strategyBrief'])->name('strategy-brief');

Route::get('/admin/customer', [AdminController::class,'customer'])->name('customer');

Route::post('/updateRole', [CustomersController::class,'updateRole'])->name('updateRole');

Route::get('/admin/add-strategy-short', [StrategyShortController::class,'addStrategy'])->name('add-strategy-short');
Route::post('/admin/save-strategy-short', [StrategyShortController::class,'saveStrategy'])->name('save-strategy-short');
Route::get('/admin/edit-strategy-short', [StrategyShortController::class,'editStrategy'])->name('edit-strategy-short');
Route::post('/admin/update-strategy-short', [StrategyShortController::class,'updateStrategy'])->name('update-strategy-short');
Route::post('/admin/delete-strategy-short', [StrategyShortController::class,'deleteStrategy'])->name('delete-strategy-short');

Route::get('/admin/add-strategy-brief', [StrategyBriefController::class,'addStrategy'])->name('add-strategy-brief');
Route::post('/admin/save-strategy-brief', [StrategyBriefController::class,'saveStrategy'])->name('save-strategy-brief');
Route::get('/admin/edit-strategy-brief', [StrategyBriefController::class,'editStrategy'])->name('edit-strategy-brief');
Route::post('/admin/update-strategy-brief', [StrategyBriefController::class,'updateStrategy'])->name('update-strategy-brief');
Route::post('/admin/delete-strategy-brief', [StrategyBriefController::class,'deleteStrategy'])->name('delete-strategy-brief');


Route::get('/file-upload', function () {  
    return view('form');  
});  
Route::post('/forms.store', [FormController::class, 'store'])->name('forms.store');

Route::get('send-email', [SendEmailController::class, 'index']);
