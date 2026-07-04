<?php

use App\Http\Controllers\EventController;
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
Route::get('/admin', [EventController::class, 'create']);
Route::post('/admin', [EventController::class, 'store']);
Route::get('/admin/{event}/edit', [EventController::class, 'edit']);
Route::put('/admin/{event}', [EventController::class, 'update']);
Route::delete('/admin/{event}', [EventController::class, 'destroy']);
