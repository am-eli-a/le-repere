<?php

namespace App\Http\Controllers;

use App\Models\Avis;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AvisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $touslesavis = Avis::where('valide', true)->latest()->get();
        return view('avis', compact('touslesavis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('avis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'description' => 'required|max:500',
            'note' => 'required|integer|min:1|max:5'
        ]);

        $avis = auth()->user()->avis()->create([
            'nom' => auth()->user()->prenom . ' ' . auth()->user()->nom,
            'description' => $data['description'],
            'note' => $data['note'],
        ]);

        $details = [
            'nom' => auth()->user()->prenom . ' ' . auth()->user()->nom,
            'email' => auth()->user()->email,
            'message' => "Un nouvel avis (" . $avis->note . "/5) a été soumis :\n\n" . $avis->description,
        ];

        // Correction : On extrait uniquement les adresses mails
        $superAdmins = User::where('role', 'super_admin')->pluck('email');

        if ($superAdmins->isNotEmpty()) {
            Mail::bcc($superAdmins)->send(new ContactMessageMail($details, "Nouvel Avis sur Le Repère"));
        }

        return back()->with('success', 'Votre avis a été envoyé :)');
    }

    /**
     * Validate an avis.
     */
    public function validateAvis(Avis $avis)
    {
        if (auth()->user()->role !== 'super_admin' && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $avis->update(['valide' => true]);

        // Correction : Remplacement de $avis->titre (qui n'existe pas) par un extrait de sa description
        $extrait = mb_strimwidth($avis->description, 0, 30, "...");

        $details = [
            'nom' => "L'équipe Le Repère",
            'message' => "Bonne nouvelle ! Votre avis « {$extrait} » vient d'être validé par l'équipe et est désormais visible sur le site.",
        ];

        if ($avis->user) {
            Mail::to($avis->user->email)->send(new ContactMessageMail($details, "Votre avis est en ligne !"));
        }

        return back()->with('success', 'L\'avis a été publié et l\'auteur a été averti.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Avis $avis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Avis $avis)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Avis $avis)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Avis $avis)
    {
        if (auth()->id() !== $avis->user_id && auth()->user()->role !== 'super_admin' && auth()->user()->role !== 'admin') {
            abort(403, "Vous n'avez pas le droit de supprimer cet avis.");
        }

        $avis->delete();
        return back()->with('success', 'Avis supprimé avec succès.');
    }
}
