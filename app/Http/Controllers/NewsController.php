<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function all_news(){
        $news = News::orderBy('created_at','desc')->get();
        return $news;
    }
}
