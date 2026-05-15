<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $fillable = ['user_id', 'titre', 'description', 'lieu', 'date', 'affiche', 'valide'];
    public function user() { return $this->belongsTo(User::class); }
}
