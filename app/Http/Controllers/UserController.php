<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function repertoire()
    {
        $categories = Category::with('users')->get();
        return view('repertoire', compact('categories'));
    }

    public function destroy(User $user)
    {
        if ($user->role !== 'admin' && $user->role !== 'super_admin') {
            abort(403);
        }
        if ($user->role === 'super_admin') {
            return back()->with('error', 'Pas possible de supprimer cet administrateur');
        }
        if ($user->id === auth()->id()) {
            return back()->with('error', 'Vous ne pouvez pas supprimer votre propre compte.');
        }
        $user->delete();
        return back()->with('success', 'L\'utilisateur a été supprimé.');
    }
}
