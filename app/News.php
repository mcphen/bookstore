<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'titre','description','img_news','user_id','status','slug'
    ];
}
