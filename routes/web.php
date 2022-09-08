<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserRegistrationController;

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

Route::get('/',function(){
    return view('users.login_form');
})->middleware('auth');
Route::get('/dashboard',[UserRegistrationController::class, 'dashboard'])->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';

Route::get('user-registration', [UserRegistrationController::class, 'UserRegistration'])->middleware('auth')->name('user_registration_form');

Route::post('user-registration', [UserRegistrationController::class, 'UserSave'])->middleware('auth')->name('user.save');
Route::get('user-list', [UserRegistrationController::class , 'userList'])->name('user.list');
Route::get('user-profile/{UserId}', [UserRegistrationController::class , 'userProfile'])->name('user.profile');
Route::get('change/user/info/{id}', [UserRegistrationController::class , 'changeUserInfo'])->name('change.user.info');
Route::post('update/user/infos', [UserRegistrationController::class , 'UpdateUserInfo'])->name('update.user.info');
