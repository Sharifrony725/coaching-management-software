<?php

use App\Http\Controllers\HomePageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;
Route::get('/',function(){
    return view('users.login_form');
})->middleware('auth');
Route::get('/dashboard',[UserRegistrationController::class, 'dashboard'])->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';
//user routes
Route::get('user-registration', [UserRegistrationController::class, 'UserRegistration'])->middleware('auth')->name('user_registration_form');
Route::post('user-registration', [UserRegistrationController::class, 'UserSave'])->middleware('auth')->name('user.save');
Route::get('user-list', [UserRegistrationController::class , 'userList'])->name('user.list');
Route::get('user-profile/{UserId}', [UserRegistrationController::class , 'userProfile'])->name('user.profile');
Route::get('change/user/info/{id}', [UserRegistrationController::class , 'changeUserInfo'])->name('change.user.info');
Route::post('update/user/infos', [UserRegistrationController::class , 'UpdateUserInfo'])->name('update.user.info');
Route::get('change/user/avatar/{id}', [UserRegistrationController::class , 'UpdateUserAvatar'])->name('change.user.avatar');
Route::post('update/user/avatar', [UserRegistrationController::class , 'SaveUpdatedUserAvatar'])->name('update.user.avatar');
Route::get('change/user/password/{id}', [UserRegistrationController::class , 'changeUserPassword'])->name('change.user.password');
Route::post('change/user/password', [UserRegistrationController::class , 'updateUserPassword'])->name('update.user.password');
//Header Footer routes
Route::get('add/header/footer', [HomePageController::class, 'create'])->name('add.header.footer');
Route::post('save/header/footer', [HomePageController::class, 'store'])->name('save.header.footer');
Route::get('manage/header/footer', [HomePageController::class, 'index'])->name('manage.header.footer');
Route::get('edit/header/footer/{id}', [HomePageController::class, 'edit'])->name('edit.header.footer');
Route::post('update/header/footer', [HomePageController::class, 'update'])->name('update.header.footer');
Route::delete('delete/header/footer/{id}', [HomePageController::class, 'destroy'])->name('delete.header.footer');
//Header Footer routes end
