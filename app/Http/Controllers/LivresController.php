<?php

namespace App\Http\Controllers;

use App\ImagesLivre;
use App\Livres;
use App\Paniers;
use Illuminate\Http\Request;

class LivresController extends Controller
{
    public function all_livre(){
        $i=0;
        $res = array();

        $livres = Livres::orderBy('created_at','desc')->get();

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

    public function addToCart($id)
    {
        $product = Livres::find($id);
        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "photo" => $product->photo
                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->photo
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function addToPanier(Request $request){
        $cart = json_decode($request->cart);
        $iduser = $request->iduser;

        foreach($cart as $c){
            $p = Paniers::where([
                'user_id'=>$iduser,'livre_id'=>$c->id
            ])->first();
            if(empty($p)){
               Paniers::create([
                'user_id'=>$iduser,'livre_id'=>$c->id,'quantity'=>$c->quantity
            ]); 
            }else{
                $p->quantity = $p->quantity + intval($c->quantity);
                $p->save();
            }
            
        }

        return "ok";
    }
}
