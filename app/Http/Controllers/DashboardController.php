<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annonce;
use App\Models\Avis;
use App\Models\Suggestion;
use App\Models\Category;
use App\Models\Information;

class DashboardController extends Controller
{
    /**
     * Affiche le dashboard selon le rôle de l'utilisateur.
     */
    public function index()
    {
        $user = auth()->user();

        // DASHBOARD UTILISATEUR SIMPLE
        if ($user->role === 'user') {
            $data = [
                'users' => User::where('role', 'user')->get(),
                'mes_annonces' => $user->annonces()->latest()->get(),
                'mes_avis' => $user->avis()->latest()->get(),
                'mes_suggestions' => $user->suggestions()->latest()->get(),
                'categories' => Category::all(),
            ];
            return view('dashboard.user', $data);
        }

        // DASHBOARD ADMIN & SUPER ADMIN
        if ($user->role === 'admin' || $user->role === 'super_admin') {

            $data = [
                // Statistiques (Compteurs)
                'total_users' => User::count(),
                'annonces_count' => Annonce::count(),
                'suggestions_count' => Suggestion::count(),
                'avis_count' => Avis::count(),
                'annonces_en_attente' => Annonce::where('valide', false)->count(),
                'avis_en_attente' => Avis::where('valide', false)->count(),
                'suggestion_en_attente' => Suggestion::where('valide', false)->count(),

                // Listes pour la gestion
                'users' => User::latest()->get(),
                'all_admins' => User::whereIn('role', ['admin', 'super_admin'])->get(),
                'categories' => Category::all(),
                'toutesLesInfos' => Information::with('user')->latest()->get(),
                'annoncesEnLigne'  => Annonce::with('user')->where('valide', true)->latest()->get(),
                'avisEnLigne'  => Avis::with('user')->where('valide', true)->latest()->get(),
                'suggestionsEnLigne'  => Suggestion::with('user')->where('valide', true)->latest()->get(),

                // Listes à modérer (Eager Loading inclus pour éviter l'erreur "prenom on null")
                'toutesLesAnnonce' => Annonce::with('user')->where('valide', false)->get(),
                'avis_a_valider' => Avis::with('user')->where('valide', false)->get(),
                'suggestions' => Suggestion::with('user')->where('valide', false)->get(),
            ];

            return view('dashboard.admin', $data);
        }

        return redirect('/')->with('error', 'Accès non autorisé.');
    }
}
