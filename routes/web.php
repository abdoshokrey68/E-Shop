<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\FbController;
use App\Http\Controllers\Auth\ForgotPasswordController;

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]],
    function () {

    Auth::routes();
    // Auth::routes(['verify' => true ]);

    Route::get('/',                                 [HomeController::class, 'index'])->name('home');
    Route::get('career',                            [HomeController::class, 'career'])->name('career');
    // Route::get('contact',                           [HomeController::class, 'contact'])->name('contact');
    Route::get('add_store',                         [HomeController::class, 'add_store'])->name('addstore')->middleware('auth');
    // Route::get('select_plane',                     [HomeController::class, 'select_plane'])->name('select_plane')->middleware('auth');
    Route::post('create_store',                     [HomeController::class, 'create_store'])->name('createstore')->middleware('auth');
    Route::get('notfound',                          [HomeController::class, 'notfound'])->name('notfound');
    Route::get('profile/edit/{user_id}',            [HomeController::class, 'profile_edit'])->name('profile.edit');
    Route::post('profile/update/{user_id}',          [HomeController::class, 'profile_update'])->name('profile.update');
});


Route::get('ajax', [HomeController::class, 'ajax'])->name('ajax');
Route::get('search_stores', [HomeController::class, 'search'])->name('search_stores');

Route::get('show_store/{store_id}', [HomeController::class, 'show_store'])->name('show_store')->middleware('checkstore');

Route::get('testdrobzone', function () {
    return view('drobzone');
});

route::get('paypal_view', function () {
    return view('drobzone');
});
Route::get('paypal',        [HomeController::class , 'paypal'])->name('paypal');
Route::get('paypal_return', [HomeController::class , 'paypal_return'])->name('paypal_return');
Route::get('paypal_cancle', [HomeController::class , 'paypal_cancle'])->name('paypal_cancle');
Route::post('uploadimage',  [HomeController::class, 'uploadimage'])->name('uploadimage');

// Route::get('auth/google', 'Auth\GoogleController@redirectToGoogle')->name('google.login');
// Route::get('auth/google/callback', 'Auth\GoogleController@handleGoogleCallback');

Route::get('auth/google',           [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback',  [GoogleController::class, 'handleGoogleCallback']);


Route::get('auth/facebook',         [FbController::class, 'redirectToFacebook'])->name('fb.login');

Route::get('auth/facebook/callback',[FbController::class, 'facebookSignin']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
// Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
// Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
// Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
