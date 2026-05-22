<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class InformationController extends Controller
{
    public function index()
    {
        $informations = Information::latest()->get();

        return view('informations', compact('informations'));
    }

    public function store(Request $request) {
        $data = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required|min:10',
            'affiche' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $path = null;
        if ($request->hasFile('affiche')) {
            $file = $request->file('affiche');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/informations'), $filename);
            $path = 'uploads/informations/' . $filename;
        }

        $info = auth()->user()->informations()->create([
            'titre' => $data['titre'],
            'contenu' => $data['description'],
            'image' => $path,
        ]);

        $emails = User::pluck('email');
        $details = [
            'nom' => "L'équipe Le Repère",
            'message' => "Une nouvelle info vient d'être postée : " . $info->titre,
        ];

        if ($emails->isNotEmpty()) {
            Mail::bcc($emails)->send(new ContactMessageMail($details, "Nouvelle Information - Le Repère"));
        }

        return back()->with('success', 'L\'information a été publiée et envoyée par mail !');
    }

    public function destroy(Information $information) {
        if (!in_array(auth()->user()->role, ['admin', 'super_admin'])) {
            abort(403);
        }

        $information->delete();
        return back()->with('success', 'Information supprimée.');
    }
}
