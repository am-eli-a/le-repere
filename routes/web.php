<?php

use App\Http\Controllers\AvisController;
use App\Http\Controllers\AnnonceController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/partenaires', function () { return view('partenaires'); })->name('partenaires');
Route::get('/repertoire', [UserController::class, 'repertoire'])->name('repertoire');
Route::get('/annonce', [AnnonceController::class, 'index'])->name('annonce');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/information', [InformationController::class, 'index'])->name('information');
Route::get('/avis', [AvisController::class, 'index'])->name('avis');
Route::get('/boite_a_idees', [SuggestionController::class, 'index'])->name('boite_a_idees');

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::post('/annonces', [AnnonceController::class, 'store'])->name('annonces.store');
    Route::delete('/annonces/{annonce}', [AnnonceController::class, 'destroy'])->name('annonces.destroy');

    Route::post('/suggestions', [SuggestionController::class, 'store'])->name('suggestions.store');
    Route::delete('/suggestions/{suggestions}', [SuggestionController::class, 'destroy'])->name('suggestion.destroy');

    Route::post('/avis', [AvisController::class, 'store'])->name('avis.store');
    Route::delete('/avis/{avis}', [AvisController::class, 'destroy'])->name('avis.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function() {
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('can:delete,user');

        Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
        Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::delete('/suggestions/{suggestions}', [SuggestionController::class, 'destroy'])->name('suggestion.destroy');

        Route::patch('/suggestions/{suggestion}/validate', [SuggestionController::class, 'validateSuggestion'])->name('suggestions.validate');
        Route::patch('/avis/{avis}/validate', [AvisController::class, 'validateAvis'])->name('avis.validate');
        Route::patch('/annonces/{annonce}/validate', [AnnonceController::class, 'validateAnnonce'])->name('annonces.validate');
    });
});

require __DIR__.'/auth.php';
