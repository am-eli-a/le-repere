<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Information extends Model
{
    public $table = 'informations';
    protected $fillable = ['user_id', 'titre', 'contenu'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
