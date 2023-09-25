<?php

use App\Http\Controllers\Event\EventController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', [EventController::class, 'index'])->name('event.index');
        Route::get('/{event}', [EventController::class, 'show'])->name('event.show');
        Route::post('/subscribe', [EventController::class, 'subscribe'])->name('event.subscribe');
        Route::post('/unsubscribe', [EventController::class, 'unsubscribe'])->name('event.unsubscribe');
    });
});

