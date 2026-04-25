<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:100|unique:categories,nom',
        ]);

        Category::create(['nom' => $request->nom]);

        return back()->with('success', 'Nouvelle catégorie ajoutée !');
    }

    public function destroy(Category $category)
    {
        $category->users()->detach();
        $category->delete();

        return back()->with('success', 'Catégorie supprimée.');
    }
}
