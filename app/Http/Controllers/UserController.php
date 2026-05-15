<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function repertoire()
    {
        $categories = Category::with('users')->get();
        return view('repertoire', compact('categories'));
    }

    public function destroy(User $user)
    {
        $me = auth()->user();

        if (!in_array($me->role, ['admin', 'super_admin'])) {
            abort(403, "Action non autorisée.");
        }
        if ($user->role === 'super_admin') {
            return back()->with('error', 'Pas possible de supprimer cet administrateur');
        }
        if ($me->role === 'admin' && $user->role === 'admin') {
            return back()->with('error', 'Un administrateur ne peut pas supprimer un autre administrateur.');
        }
        if ($user->id === $me->id) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        $user->delete();
        return back()->with('success', 'L\'utilisateur a été supprimé.');
    }

    public function joinRepertoire(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
        ]);

        $user = auth()->user();

        $user->categories()->syncWithoutDetaching([$request->category_id]);

        $superAdmins = User::where('role', 'super_admin')->get(); //

        $details = [
            'nom' => $user->prenom . ' ' . $user->nom,
            'email' => $user->email,
            'message' => "Nouvelle demande d'inscription au répertoire dans la catégorie : " . $request->category_nom,
        ];

        if ($superAdmins->isNotEmpty()) {
            Mail::bcc($superAdmins)->send(new ContactMessageMail($details, "Demande Répertoire - Le Repère"));
        }

        return back()->with('success', 'Votre demande pour rejoindre le répertoire a été envoyée !');
    }

    public function demote(User $user) {
        $me = auth()->user();
        if ($user->id === $me->id) {
            return back()->with('error', 'Vous ne pouvez pas vous auto rétrograder.');
        }
        $user->update(['role' => 'user']);
        return back()->with('success', "L'administrateur a été rétrogradé en utilisateur simple.");
    }

    public function promote(User $user)
    {
        if (auth()->user()->role !== 'super_admin') {
            abort(403, "Seul le créateur du Repère peut nommer des administrateurs.");
        }

        $user->update(['role' => 'admin']);

        return back()->with('success', "{$user->prenom} est désormais Administrateur.");
    }

}
