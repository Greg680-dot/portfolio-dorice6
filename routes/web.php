<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Models\Event;

Route::get('/', function () {
    $events = Event::latest()->take(3)->get();
    return view('home', compact('events'));
});

Route::get('/events', [EventController::class, 'index']);
Route::get('/admin', [EventController::class, 'create']);
Route::post('/admin', [EventController::class, 'store']);
