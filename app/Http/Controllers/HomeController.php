<?php

namespace App\Http\Controllers;

use App\Livres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title="Accueil";
        return view('frontend/home');
    }

    public function adminView()
    {
        $title="Tableau de bord";
        return view('layouts/backend');
    }

    public function single_livre($slug){
        $livre = Livres::where('slug',$slug)->first();
        $title=$livre->titre;
        return view('frontend.single_product')->with([
            'idlivre'=>$livre->id,
            'title'=>$title
        ]);
    }

    public function boutiques(){
        $title='Boutique ';
        return view('frontend.boutique')->with([
            
            'title'=>$title
        ]);
    }

    public function about(){
        $title='A Propos ';
        return view('frontend.about')->with([
            
            'title'=>$title
        ]);
    }

    public function cart(){
        $title='Panier';
        return view('frontend.cart')->with([
            
            'title'=>$title
        ]);
    }

    public function identification(){
        if(Auth::user()){
            return redirect('/');
        }else{
            $title='Identification';
            return view('frontend.identification')->with([
                
                'title'=>$title
            ]);
        }
        
    }
}
