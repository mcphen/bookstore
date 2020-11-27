<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{

    public $with=['utilisateur'];
    protected $fillable = [
        'biographie','titre','institution','fonction','pays','slug','user_id','status'
    ];

    public function utilisateur(){
        return $this->belongsTo('App\User','user_id');
    }
}
