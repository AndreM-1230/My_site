<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiteTablesController;

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

Route::name('table.')->group(function (){
    Route::get('/tables', [SiteTablesController::class, 'index'])->name('index');
    Route::get('/tables/{table}/show/{id}', [SiteTablesController::class, 'show'])->name('show');
    Route::get('/tables/{table}/edit/{id}', [SiteTablesController::class, 'edit'])->name('edit');
    Route::put('/tables/{table}/update/{id}', [SiteTablesController::class, 'update'])->name('update');
    Route::delete('/tables/{table}/delete/{id}', [SiteTablesController::class, 'destroy'])->name('destroy');
    Route::get('/tables/create', [SiteTablesController::class, 'create'])->name('create');
    Route::put('/tables/{table}/save', [SiteTablesController::class, 'save'])->name('save');
    Route::post('/tables/{table}/search', [SiteTablesController::class, 'search'])->name('search');
    Route::get('/tables/{table}/search', [SiteTablesController::class, 'search'])->name('search');
});

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

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
