<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Front\TimeCardController;

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
    Route::get($authRoute['home'], [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/timecard/{shop_code}', [TimeCardController::class, 'index'])->name('timecard.index');
    Route::get('/timecard/{shop_code}/input/{id}', [TimeCardController::class, 'input'])->name('timecard.input');

    Route::post('/timecard/{shop_code}/work-start', [TimeCardController::class, 'workStart'])->name('timecard.work-start');
    Route::post('/timecard/{shop_code}/break-start', [TimeCardController::class, 'breakStart'])->name('timecard.break-start');
    Route::post('/timecard/{shop_code}/break-end', [TimeCardController::class, 'breakEnd'])->name('timecard.break-end');
    Route::post('/timecard/{shop_code}/work-end', [TimeCardController::class, 'workEnd'])->name('timecard.work-end');
});


require __DIR__.'/auth.php';
