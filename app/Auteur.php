<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{

    public $width=['user'];
    protected $fillable = [
        'biographie','titre','institution','fonction','pays','slug','user_id','status'
    ];

    public function user(){
        return $this->belongsTo('App\User','user_id','id');
    }
}
