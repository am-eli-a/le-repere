<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Annonce;
use App\Models\Avis;
use App\Models\Suggestion;
use App\Models\Category;

class DashboardController extends Controller
{
    /**
     * Affiche le dashboard selon le rôle de l'utilisateur.
     */
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'user') {

            $data = [
                'mes_annonces'    => $user->annonces()->latest()->get(),
                'mes_avis'        => $user->avis()->latest()->get(),
                'mes_suggestions' => $user->suggestions()->latest()->get(),
            ];

            return view('dashboard.user', $data);
        }

        if ($user->role === 'admin' || $user->role === 'super_admin') {

            $data = [
                'total_users'       => User::count(),
                'users'             => User::latest()->get(),
                'categories'        => Category::all(),
                'suggestions'        => Suggestion::all(),
                'annonces_count'    => Annonce::count(),
                'avis_en_attente'   => Avis::where('valide', false)->count(),
                'suggestions_count' => Suggestion::count(),

                'avis_a_valider'    => Avis::where('valide', false)->latest()->get(),
            ];

            return view('dashboard.admin', $data);
        }

        return redirect('/')->with('error', 'Accès non autorisé.');
    }
}
