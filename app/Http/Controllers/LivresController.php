<?php

namespace App\Http\Controllers;

use App\ImagesLivre;
use App\Livres;
use Illuminate\Http\Request;

class LivresController extends Controller
{
    public function all_livre(){
        $i=0;
        $res = array();

        $livres = Livres::all();

        foreach($livres as $l){
            $res[$i] = array(
                'livre'=>$l,
                'img'=>ImagesLivre::where('livre_id', $l->id)->first(),
                //'auteur'=>$l::with('auteurs')->get()
            );
            $i++;
        }
        return $res;
    }

    public function fetchLivre($id){
        $livre = Livres::find($id);
        
        return $livre;
    }
}
