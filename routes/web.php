<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TrophyController;
use App\Models\Event;
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
    $events = Event::latest()->take(3)->get();

    return view('home', compact('events'));
});

Route::get('/home', fn () => redirect('/'));
Route::get('/accueil', fn () => redirect('/'));
Route::get('/events', [EventController::class, 'index']);
Route::get('/evenements', [EventController::class, 'index']);
Route::get('/publications', function () {
    $events = Event::latest()->get();

    return view('publications', compact('events'));
});
Route::get('/trophees', [TrophyController::class, 'index']);
Route::get('/trophies', [TrophyController::class, 'index']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware(['guest', 'throttle:5,1']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::post('/contact', [ContactController::class, 'send'])->name('contact.send')->middleware('throttle:5,1');

Route::middleware('auth')->group(function () {
    Route::get('/admin', [EventController::class, 'create']);
    Route::post('/admin', [EventController::class, 'store']);
    Route::get('/admin/{event}/edit', [EventController::class, 'edit']);
    Route::put('/admin/{event}', [EventController::class, 'update']);
    Route::delete('/admin/{event}', [EventController::class, 'destroy']);

    Route::post('/admin/trophees', [TrophyController::class, 'store']);
    Route::get('/admin/trophees/{trophy}/edit', [TrophyController::class, 'edit']);
    Route::put('/admin/trophees/{trophy}', [TrophyController::class, 'update']);
    Route::delete('/admin/trophees/{trophy}', [TrophyController::class, 'destroy']);
});
