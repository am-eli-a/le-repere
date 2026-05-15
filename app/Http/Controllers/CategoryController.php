<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Mail\ContactMessageMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100|unique:categories,nom',
        ]);

        $details = [
            'nom'     => auth()->user()->prenom . ' ' . auth()->user()->nom,
            'email'   => auth()->user()->email,
            'message' => $request->nom,
        ];

        Category::create(['nom' => $request->nom]);
        $allUser = User::all();

        if ($allUser->count() > 0) {
            Mail::bcc($allUser->pluck('email'))->send(new ContactMessageMail($details, "Nouvelle Catégorie sur Le Repère"));
        }

        return back()->with('success', 'Nouvelle catégorie ajoutée !');
    }

    public function requestNewCategory()
    {
        $user = auth()->user();

        $admins = User::whereIn('role', ['admin', 'super_admin'])->get();

    $details = [
        'nom'     => $user->prenom . ' ' . $user->nom,
        'email'   => $user->email,
        'message' => "L'utilisateur souhaite rejoindre le répertoire mais sa catégorie n'existe pas encore. Merci de le contacter pour ajouter sa spécialité.",
    ];

    if ($admins->isNotEmpty()) {
        Mail::bcc($admins)->send(new ContactMessageMail($details, "Demande de nouvelle catégorie - Le Repère"));
    }

    return back()->with('success', 'Les administrateurs ont été prévenus, ils reviendront vers vous pour ajouter votre catégorie !');
}

    public function destroy(Category $category)
    {
        $category->users()->detach();
        $category->delete();

        return back()->with('success', 'Catégorie supprimée.');
    }
}
