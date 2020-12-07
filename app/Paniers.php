<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paniers extends Model
{
    protected $fillable = [
        'user_id','livre_id','quantity'
    ];
}
