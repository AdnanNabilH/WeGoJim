<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Kirim email
        Mail::raw("Nama: {$validated['name']}\nEmail: {$validated['email']}\n\nPesan:\n{$validated['message']}", function ($message) use ($validated) {
            $message->to('adnannabil19@gmail.com') 
                    ->subject('Pesan dari Contact Form - WeGoJim')
                    ->replyTo($validated['email'], $validated['name']);
        });

        return back()->with('success', 'Pesan berhasil dikirim!');
    }
}
