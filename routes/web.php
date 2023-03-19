<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('tasks', TaskController::class);
//Route::resource('account', AccountController::class);
Route::get('/', function () {
    return view('welcome');
});


Route::name('user.')->group(function (){
    Route::view('/account', 'accounts.view')
        ->middleware('auth')
        ->name('private');

    Route::get('/login', function (){
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        return view('login');
    })->name('login');

    Route::post('/login',
        [LoginController::class,'login']);

    Route::get('/logout',function (){
        Auth::logout();
        return redirect('/');
    })->name('logout');

    Route::get('/registration',function (){
        if (Auth::check()){
            return redirect(route('user.private'));
        }
        return view('registration');
    })->name('registration');

    Route::post('/registration',
        [RegistrationController::class,'save']);

});
Route::view('/setting', 'accounts.setting')->name('setting');
Route::get('/change-password', 'App\Http\Controllers\ChangePasswordController@setting')->name('password.change');

Route::patch('/change-password', 'App\Http\Controllers\ChangePasswordController@update')->name('password.update');




