<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
            // Honeypot anti-spam : ce champ doit rester vide, il est masqué en CSS pour les humains.
            'website' => 'prohibited',
        ]);

        Mail::to(config('mail.to_address'))
            ->send(new ContactMessage($validated['name'], $validated['email'], $validated['message']));

        return redirect('/#contact')->with('contact_success', 'Merci ! Votre message a bien été envoyé, Dorice vous répondra rapidement.');
    }
}
