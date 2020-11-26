<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagesLivre extends Model
{
    protected $fillable = [
        'images_livres', 'livre_id'
    ];

    public function getImagesLivresAttribute($photo){
        return asset('storage/'.$photo);
    }
}
