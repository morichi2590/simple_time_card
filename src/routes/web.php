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

$authRoute = config('auth.dashbord.web');

Route::get('/', function () {
    return view('welcome');
});

Route::prefix($authRoute['prefix'])->middleware(['auth'])->group(function () use ($authRoute){
    Route::get($authRoute['home'], function () {
        return view('dashboard');
    })->name('dashboard');
});


require __DIR__.'/auth.php';
