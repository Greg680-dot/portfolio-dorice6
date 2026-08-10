<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Trophy;


class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest()->get();
        return view('events', compact('events'));
    }

    public function create()
    {
        $events = Event::latest()->get();
        $trophies = Trophy::latest('date')->get();
        return view('admin', compact('events', 'trophies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:passe,encours,avenir',
            'date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photoName);
            $validated['photo'] = $photoName;
        }

        Event::create($validated);
        return redirect('/admin')->with('success', 'Événement ajouté avec succès');
    }

    public function edit(Event $event)
    {
        $events = Event::latest()->get();
        $trophies = Trophy::latest('date')->get();
        return view('admin', compact('event', 'events', 'trophies'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:passe,encours,avenir',
            'date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photoName);
            $validated['photo'] = $photoName;
        }

        $event->update($validated);
        return redirect('/admin')->with('success', 'Événement modifié avec succès');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect('/admin')->with('success', 'Événement supprimé avec succès');
    }
}