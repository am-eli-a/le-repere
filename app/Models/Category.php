<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['nom'];
    public function users() { return $this->belongsToMany(User::class); }
}
