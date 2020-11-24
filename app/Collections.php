<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Collections extends Model
{
    protected $fillable = [
        'titre', 'publish','description','slug','popular','categorie_id'
    ];
}
