<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Livres extends Model
{
    public $with=['auteurs','collections','images'];
    protected $fillable = [
        'titre', 'slug', 'description','price','publish','popular_livre','statut'
    ];

    public function collections(){
        return $this->belongsToMany(Collections::class,'collection_livre','livre_id','collection_id');
    }

    public function auteurs(){
        return $this->belongsToMany(Auteur::class,'auteur_livre','livre_id','auteur_id');
    }

    public function images(){
        return $this->hasMany('App\ImagesLivre','livre_id');
    }
}
