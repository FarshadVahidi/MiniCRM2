<?php

use App\Http\Controllers\User\CompanyController;
use App\Http\Controllers\User\UserController;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'role:user', 'prefix' => 'user', 'as'=> 'users.'], function(){
        Route::resource('user', UserController::class);
        Route::resource('company', CompanyController::class);
    });
});
