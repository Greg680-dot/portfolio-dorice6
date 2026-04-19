<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events', compact('events'));
    }

    public function create()
    {
        return view('admin');
    }

    public function store(Request $request)
    {
        Event::create($request->all());
        return redirect('/events')->with('success', 'Événement ajouté');
    }
}