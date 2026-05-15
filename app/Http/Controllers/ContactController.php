<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller {
    public function store(Request $request)
    {
    $data = $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'email' => 'required|email',
        'objet'   => 'required',
        'message' => 'required|min:10',
    ]);

    $details = [
        'nom'     => $request->prenom . ' ' . $request->nom,
        'email'   => $request->email,
        'objet' => $request->objet,
        'message' => $request->message,
    ];

    $admins = User::whereIn('role', ['admin', 'super_admin'])->get();

    if ($admins->isNotEmpty()) {
        Mail::bcc($admins->pluck('email'))->send(new ContactMessageMail($details, $request->objet));
    }

    return back()->with('success', 'Votre message a bien été envoyé aux administrateurs !');
    }
}
