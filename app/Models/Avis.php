<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avis extends Model
{
    protected $fillable = ['user_id', 'nom', 'description', 'note', 'valide'];
    public function user() {
        return $this->belongsTo(User::class);
    }
}
