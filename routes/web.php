<?php

use App\Http\Controllers\AvisController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/partenaires', function () { return view('partenaires'); })->name('partenaires');
Route::get('/repertoire', [UserController::class, 'repertoire'])->name('repertoire');
Route::get('/annonce', [AnnonceController::class, 'index'])->name('annonce');
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::get('/information', [InformationController::class, 'index'])->name('information');
Route::get('/avis', [AvisController::class, 'index'])->name('avis');
Route::get('/boite_a_idees', [SuggestionController::class, 'index'])->name('boite_a_idees');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// ... tes imports ...

Route::middleware('auth')->group(function () {
    // Routes Utilisateur Classiques
    Route::post('/repertoire/rejoindre', [UserController::class, 'joinRepertoire'])->name('repertoire.join');
    Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store');
    Route::post('/suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');
    Route::post('/avis', [AvisController::class, 'store'])->name('avis.store');
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.submit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/request-category', [CategoryController::class, 'requestNewCategory'])->name('category.request');

    // --- ESPACE ADMIN ---
    Route::prefix('admin')->group(function() {
        // Création (Formulaires)
        Route::get('/annonces/creer', [AnnonceController::class, 'create'])->name('annonces.create');
        Route::get('/suggestions/creer', [SuggestionController::class, 'create'])->name('suggestions.create');
        Route::get('/avis/creer', [AvisController::class, 'create'])->name('avis.create');

        // Validations (Patch)
        Route::patch('/suggestions/{suggestion}/validate', [SuggestionController::class, 'validateSuggestion'])->name('suggestions.validate');
        Route::patch('/avis/{avis}/validate', [AvisController::class, 'validateAvis'])->name('avis.validate');
        Route::patch('/annonces/{annonce}/validate', [AnnonceController::class, 'validateAnnonce'])->name('annonces.validate');

        // Suppressions (Delete)
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::delete('/suggestions/{suggestions}', [SuggestionController::class, 'destroy'])->name('suggestion.destroy');
        Route::delete('/annonces/{annonce}', [AnnonceController::class, 'destroy'])->name('annonces.destroy');
        Route::delete('/avis/{avis}', [AvisController::class, 'destroy'])->name('avis.destroy');

        // Gestion Catégories
        Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
        Route::post('/suggestions/{suggestion}/like', [SuggestionController::class, 'toggleLike'])->name('suggestions.like');
    });

    // --- ESPACE SUPER ADMIN ---
    Route::prefix('super_admin')->group(function() {
        Route::patch('/users/{user}/demote', [UserController::class, 'demote'])->name('user.demote');
        Route::patch('/users/{user}/promote', [UserController::class, 'promote'])->name('user.promote');
        Route::post('/informations', [InformationController::class, 'store'])->name('information.store');
        Route::delete('/informations/{information}', [InformationController::class, 'destroy'])->name('information.destroy');

    });
});

require __DIR__.'/auth.php';
