<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;

#[Fillable(['prenom', 'nom', 'email', 'password', 'role', 'age', 'lieu', 'lien_demo', 'image', 'insta'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Les métiers/catégories du profil (Répertoire)
     */
    public function categories(): BelongsToMany {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Les annonces postées par cet utilisateur
     */
    public function suggestions(): HasMany {
        return $this->hasMany(Suggestion::class);
    }

    public function avis(): HasMany {
        return $this->hasMany(Avis::class);
    }

    public function annonces(): HasMany {
        return $this->hasMany(Annonce::class);
    }

    public function informations()
    {
        return $this->hasMany(Information::class);
    }

    public static function superAdmins() {
        return self::where('role', 'super-admin')->get();
    }
}
