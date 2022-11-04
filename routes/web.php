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
use App\Http\Controllers\RefundsController;
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

Route::get("/", [PagesController::class,"index"])->name("home");
Route::get("/about-us", [PagesController::class,"about"])->name("about-us");
Route::get("/contact-us", [PagesController::class,"contact"])->name("contact-us");
Route::post("/submit-query", [PagesController::class,"submitQuery"])->name("submit-query");
Route::get("/terms-and-conditions", [PagesController::class,"terms"])->name("terms-and-conditions");
Route::get("/privacy-policy", [PagesController::class,"privacy"])->name("privacy-policy");
Route::get("/disclaimer", [PagesController::class,"disclaimer"])->name("disclaimer");
Route::get("/login", [PagesController::class,"login"])->name("login");
Route::get("/register", [PagesController::class,"register"])->name("register");

Route::post("/display-otp", [CustomersController::class,"displayOTP"])->name("display-otp");
Route::post("/verify-otp", [CustomersController::class,"verifyOtp"])->name("verify-otp");
Route::get("/save-customer", [CustomersController::class,"saveCustomer"])->name("save-customer");
Route::post("/checkCustomer", [CustomersController::class,"checkCustomer"])->name("checkCustomer");
Route::get("/display-reset-password", [CustomersController::class, "displayResetPassword"])->name("display-reset-password");
Route::post("/send-password-link", [CustomersController::class,"sendPasswordLink"])->name("send-password-link");
Route::get("/reset-password/{token}", [CustomersController::class,"resetPassword"])->name("reset-password");
Route::get("/display-change-password", [CustomersController::class,"displayChangePassword"])->name("display-change-password");
Route::post("/change-password", [CustomersController::class,"changePassword"])->name("change-password");
Route::get("/profile", [CustomersController::class,"profile"])->name("profile");
Route::post("/update-name", [CustomersController::class,"updateName"])->name("update-name");
Route::post("/verify-email", [CustomersController::class,"verifyEmail"])->name("verify-email");
Route::post("/verify-email-otp", [CustomersController::class,"verifyEmailOtp"])->name("verify-email-otp");
Route::post("/change-photo", [CustomersController::class,"changePhoto"])->name("change-photo");
Route::get("/delete-photo", [CustomersController::class,"deletePhoto"])->name("delete-photo");
Route::get("/resend-email-otp", [CustomersController::class,"resendEmailOtp"])->name("resend-email-otp");
Route::get("/logout", [CustomersController::class,"logout"])->name("logout");

Route::get("/strategy-list", [CartController::class,"strategyList"])->name("strategy-list");

Route::get("/admin/login", [AdminController::class,"login"])->name("admin-login");
Route::post("/admin/check-admin-user", [AdminController::class,"checkAdminUser"])->name("check-admin-user");
Route::get("/admin/home", [AdminController::class,"home"])->name("admin-home");
Route::get("/admin/strategy-short", [AdminController::class,"strategyShort"])->name("strategy-short");
Route::get("/admin/customer", [AdminController::class,"customer"])->name("customer");
Route::get("/admin/logout", [AdminController::class,"logout"])->name("admin-logout");

Route::get("/admin/updateRole/{id}", [CustomersController::class,"updateRole"])->name("updateRole");

Route::get("/admin/add-strategy-short", [StrategyShortController::class,"addStrategy"])->name("add-strategy-short");
Route::post("/admin/save-strategy-short", [StrategyShortController::class,"saveStrategy"])->name("save-strategy-short");
Route::get("/admin/edit-strategy-short/{id}", [StrategyShortController::class,"editStrategy"])->name("edit-strategy-short");
Route::post("/admin/update-strategy-short", [StrategyShortController::class,"updateStrategy"])->name("update-strategy-short");
Route::get("/admin/delete-strategy-short/{id}", [StrategyShortController::class,"deleteStrategy"])->name("delete-strategy-short");

Route::get("/send-email", [SendEmailController::class, "index"]);
Route::get("/sms", [SMSController::class, "sendSMS"]);