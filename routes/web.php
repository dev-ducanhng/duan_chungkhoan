<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class, 'postLogin']);

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'saveRegister']);
Route::get('registerK', [RegisterController::class, 'showRegistrationFormK'])->name('registerK');
Route::post('registerK', [RegisterController::class, 'saveRegisterK']);

Route::get('edit/{id}', [UserController::class, 'editForm'])->name('user.edit');
Route::post('edit/{id}', [UserController::class, 'saveEdit']);

Route::get('/detail-user/{id}', [UserController::class, 'detail'])->name('user.detail');

Route::any('logout', function () {
    Auth::logout();
    return redirect(route('login'));
});
Route::any('forbiddance', function (){
    return "Bạn không có quyền truy cập trang này";
})->name('403');
