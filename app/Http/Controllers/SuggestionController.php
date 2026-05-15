<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;


class SuggestionController extends Controller
{
    public function index()
    {
        $suggestions = Suggestion::with('user')
            ->withCount('likes')
            ->where('valide', true)
            ->latest()
            ->get();
        return view('boite_a_idees', compact('suggestions'));
    }

    public function create()
    {
        return view('suggestions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $data = $request->validate([
            'titre' => 'nullable|max:255',
            'description' => 'required|min:10'
        ]);

        $suggestion = auth()->user()->suggestions()->create([
            'titre' => $data['titre'],
            'description' => $data['description'],
        ]);

        $details = [
            'nom'     => auth()->user()->prenom . ' ' . auth()->user()->nom,
            'email'   => auth()->user()->email,
            'message' => $suggestion->description,
        ];

        $superAdmins = User::where('role', 'super_admin')->get();

        if ($superAdmins->isNotEmpty()) {
            Mail::bcc($superAdmins)->send(new ContactMessageMail($details, "Nouvelle suggestion posté !"));
        }

        return back()->with('success', 'Merci pour votre suggestion !');
    }

    public function validateSuggestion(Suggestion $suggestion)
    {
        if (auth()->user()->role !== 'super_admin' && auth()->user()->role !== 'admin') {
            abort(403);
        }

        $suggestion->update(['valide' => true]);

        if ($suggestion->user) {
            $details = [
                'nom'     => $suggestion->user->prenom,
                'message' => "Bonne nouvelle ! Votre suggestion « {$suggestion->titre} » vient d'être validée.",
                'email'   => $suggestion->user->email,
            ];

            Mail::to($suggestion->user->email)->send(new ContactMessageMail($details, "Votre suggestion est en ligne !"));
        }

        return back()->with('success', 'Suggestion validée et utilisateur notifié.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suggestion $suggestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suggestion $suggestion)
    {
        if (auth()->id() !== $suggestion->user_id && auth()->user()->role !== 'super_admin') {
            abort(403, "Vous n'avez pas le droit de supprimer cette suggestion.");
        }

        $suggestion->delete();
        return back()->with('success', 'Suggestion supprimée avec succès.');
    }

    public function toggleLike(Suggestion $suggestion)
    {
        $user = auth()->user();

        $suggestion->likes()->toggle($user->id);

        return back();
    }
}
