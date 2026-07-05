<?php

namespace App\Http\Controllers;

use App\Models\Annonce;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toutesLesAnnonce = Annonce::where('valide', true)->with('user')->latest()->get();
        $types = [
            'recherche_talent' => 'Recherche de talent',
            'pret_materiel' => 'Prêt de matériel',
            'proposition_scenario' => 'Proposition de scénario',
            'appel_projet' => 'Appel à projet',
            'autre' => 'Autre',
        ];
        return view('annonce', compact('toutesLesAnnonce', 'types'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('annonces.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'titre' => 'required|max:255',
            'description' => 'required',
            'lieu' => 'nullable|string',
            'date' => 'nullable|date',
            'affiche' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'type' => 'required|in:recherche_talent,pret_materiel,proposition_scenario,appel_projet,autre',
        ]);

        $path = null;
        if ($request->hasFile('affiche')) {
            $file = $request->file('affiche');
            $filename = 'affiche_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $path = 'uploads/' . $filename;
        }

        $annonce = auth()->user()->annonces()->create([
            'titre' => $data['titre'],
            'type' => $data['type'],
            'description' => $data['description'],
            'lieu' => $data['lieu'],
            'date' => $data['date'],
            'affiche' => $path,
        ]);

        $details = [
            'nom' => auth()->user()->prenom . ' ' . auth()->user()->nom,
            'email' => auth()->user()->email,
            'message' => "Une nouvelle annonce vient d'être publiée : " . $annonce->titre,
        ];
        $emailsMembres = User::pluck('email')->toArray();
        if (!empty($emailsMembres)) {
            Mail::bcc($emailsMembres)->queue(new ContactMessageMail($details, "Nouvelle annonce sur Le Repère !"));
        }

        return back()->with('success', 'Annonce envoyée, en attente de validation !');
    }

    /**
     * Validate an annonce and notify all members.
     */
    public function validateAnnonce(Annonce $annonce)
    {
        $annonce->update(['valide' => true]);

        $details = [
            'nom' => "L'équipe Le Repère",
            'message' => "Une nouvelle annonce vient d'être publiée : {$annonce->titre}. Connectez-vous pour la découvrir !"
        ];

        $emails = User::pluck('email');

        if ($emails->isNotEmpty()) {
            Mail::bcc($emails)->send(new ContactMessageMail($details, "Nouvelle Annonce sur Le Repère : " . $annonce->titre));
        }

        return back()->with('success', 'Annonce publiée et tous les membres ont été avertis.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Annonce $annonce)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Annonce $annonce)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Annonce $annonce)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Annonce $annonce)
    {
        // Vérification de sécurité : l'auteur ou le super_admin uniquement
        if (auth()->id() !== $annonce->user_id && auth()->user()->role !== 'super_admin' && auth()->user()->role !== 'admin') {
            abort(403, "Vous n'avez pas le droit de supprimer cette annonce.");
        }

        $annonce->delete();
        return back()->with('success', 'Annonce supprimée avec succès.');
    }
}
