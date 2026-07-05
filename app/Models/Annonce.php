<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $fillable = ['user_id', 'titre', 'type', 'description', 'lieu', 'date', 'affiche', 'valide'];
    public function user() { return $this->belongsTo(User::class); }

    public function getTypeLibelleAttribute(): string
    {
        return match($this->type) {
            'recherche_talent' => 'Recherche de talent',
            'pret_materiel' => 'Prêt de matériel',
            'proposition_scenario' => 'Proposition de scénario',
            'appel_projet' => 'Appel à projet',
            default => 'Autre',
        };
    }
}
