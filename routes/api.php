<?php

use App\Http\Controllers\API\AuthenticatedSessionController;
use App\Http\Controllers\API\Event\EventController;
use App\Http\Controllers\API\RegisteredUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('v1/register', [RegisteredUserController::class, 'store'])
    ->middleware('guest')
    ->name('api.register');

Route::post('v1/login', [AuthenticatedSessionController::class, 'store'])
    ->middleware('guest')
    ->name('api.login');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('api.logout');

Route::get('v1/events', [EventController::class, 'index']);
Route::post('v1/event', [EventController::class, 'store']);
Route::delete('v1/events/{event}', [EventController::class, 'destroy']);
Route::post('v1/event/subscribe', [EventController::class, 'subscribe']);
Route::post('v1/event/unsubscribe', [EventController::class, 'unSubscribe']);
