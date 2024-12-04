<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\frontend\SocialController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\frontend\CustomerController;
use App\Http\Controllers\frontend\VerificationController;
use App\Http\Controllers\frontend\ForgotPasswordController;
use RealRashid\SweetAlert\Facades\Alert;//dùng sweet alert


//Login Google
Route::get('/auth/redirect/{provider}', [SocialController::class, 'redirect']);
Route::get('/callback/{provider}', [SocialController::class, 'callback']);


Route::get('/customer', [CustomerController::class, 'index'])->name('login');
Route::post('/customer/login', [CustomerController::class, 'customerLogin']);
Route::post('/customer/register', [CustomerController::class, 'customerRegister']);
Route::get('/email/verify/{user_id}', [VerificationController::class, 'verify'])->name('verification.verify');
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password/{token}', [ForgotPasswordController::class, 'reset'])->name('password.update');
Route::prefix('customer')->middleware('HandleLoginCustomer')->group(function () {    
    Route::post('/logout', [CustomerController::class, 'customerLogout']);
});

//Route đăng nhập phía quản trị
Route::get('/admin', [UserController::class, 'getLogin']);
Route::post('/admin', [UserController::class, 'postLogin']);


//Route prefix admin, middleware login admin
Route::prefix('admin')->middleware('handleLoginAdmin')->group(function () {
    //Route dashboard
    Route::get('/dashboard', [DashboardController::class, 'index']);
    //Route Users
    Route::resource('/users', UserController::class)->middleware('handleRoleAdmin');  
});

//Route handle Filemanager
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

//Route link storage with puplic
Route::get('/linkstorage', function () {
    Artisan::call('storage:link');
    echo "Link done !";
});


//Route clear cache, optimize
Route::get('/optimize', function () {
    Artisan::call('optimize');
    echo "Optimize done !";
});

