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

// Attachments
Route::get('user/{filename}', [App\Http\Controllers\Attachement\AttachementController::class, 'user'])->name('user.image');
Route::get('resultats/{filename}', [App\Http\Controllers\Attachement\AttachementController::class, 'file'])->name('file.image');




Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [App\Http\Controllers\Web\HomeController::class, 'welcome'])->name('welcome');
Route::get('/verify-info', [App\Http\Controllers\Web\HomeController::class, 'showVerifyInfoForm'])->name('verify.info');
Route::get('/résultats', [App\Http\Controllers\Web\HomeController::class, 'showResult'])->name('result.info');
Route::get('/user-print/{userId}', [App\Http\Controllers\Web\HomeController::class, 'print'])->name('print.result');



//?Admin Routes
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function(){


    Route::get('/', [App\Http\Controllers\Admin\Auth\AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [App\Http\Controllers\Admin\Auth\AuthController::class, 'login'])->name('login');
    Route::get('logout', [App\Http\Controllers\Admin\Auth\AuthController::class, 'logout'])->name('logout');

    Route::group(['middleware' => 'admin'], function(){

        Route::get('admin/{filename}', [App\Http\Controllers\Attachement\AttachementController::class, 'admin'])->name('image');

        Route::get('dashboard', [App\Http\Controllers\Admin\Dashboard\DashboardController::class, 'dashboard'])->name('dashboard');

        //User
        Route::resource('users', App\Http\Controllers\Admin\User\UserController::class);

        //Exams
        Route::resource('exams', App\Http\Controllers\Admin\Exam\ExamResultController::class);


        //Admin Profile
        Route::get('profile', [App\Http\Controllers\Admin\Profile\ProfileController::class, 'viewProfile'])->name('profile');
        Route::post('update-profile', [App\Http\Controllers\Admin\Profile\ProfileController::class, 'updateProfile'])->name('update.profile');

        //Change Password
        Route::get('setting', [App\Http\Controllers\Admin\Setting\SettingController::class, 'viewSetting'])->name('setting');
        Route::post('update-password', [App\Http\Controllers\Admin\Setting\SettingController::class, 'updatePassword'])->name('update.password');

    });

});


