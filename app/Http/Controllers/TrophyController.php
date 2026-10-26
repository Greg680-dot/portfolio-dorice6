<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Trophy;
use Illuminate\Http\Request;

class TrophyController extends Controller
{
    public function index()
    {
        $trophies = Trophy::latest('date')->get();

        return view('trophies', compact('trophies'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:25600',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photoName);
            $validated['photo'] = $photoName;
        }

        Trophy::create($validated);

        return redirect('/admin')->with('success', 'Trophée ajouté avec succès');
    }

    public function edit(Trophy $trophy)
    {
        $events = Event::latest()->get();
        $trophies = Trophy::latest('date')->get();

        return view('admin', compact('trophy', 'events', 'trophies'));
    }

    public function update(Request $request, Trophy $trophy)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:25600',
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $photoName);
            $validated['photo'] = $photoName;
        }

        $trophy->update($validated);

        return redirect('/admin')->with('success', 'Trophée modifié avec succès');
    }

    public function destroy(Trophy $trophy)
    {
        $trophy->delete();

        return redirect('/admin')->with('success', 'Trophée supprimé avec succès');
    }
}
