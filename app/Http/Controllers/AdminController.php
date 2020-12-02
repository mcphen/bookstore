<?php

namespace App\Http\Controllers;

use App\Auteur;
use App\Categories;
use App\Collections;
use App\ImagesLivre;
use App\Livres;
use App\News;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    
     //=============================== CRUD TABLE ROLE =============================================//
     public function role_list(){
        $title = "Liste role ";
        return view('backend/role')->with(['title'=>$title]);
    }

    public function add_role(Request $request){
        $this->validate($request, [
            'role' => 'required',
           
        ]);
        Roles::create([
            'role'=>$request->role,
        ]);
    }

    public function update_role(Request $request, $id){
        $role = Roles::findOrFail($id);
        $role->role = $request->role;

        $role->save();
        return ['message' =>'Role modifié'];
    }

    public function all_role(){
        $role= Roles::all();
        return $role->toJson();
    }

    public function delete_role($id){
        $role = Roles::findOrFail($id);

        $role->delete();

        return ['message' =>'Role supprimé'];
    }

     //=============================== CRUD TABLE CATEGORIES =============================================//

    public function categorie_list(){
        $title = "Liste categorie ";
        return view('backend/categorie')->with(['title'=>$title]);
    }

    public function add_categorie(Request $request){
        $this->validate($request, [
            'intitule' => 'required',
           
        ]);
        Categories::create([
            'cat'=>$request->intitule,
            'publish'=>$request->statut,
        ]);
    }

    public function update_categorie(Request $request, $id){
        $role = Categories::findOrFail($id);
        $role->cat = $request->intitule;
        $role->publish =$request->statut;

        $role->save();
        return ['message' =>'Role modifié'];
    }

    public function all_categorie(){
        $role= Categories::all();
        return $role->toJson();
    }

    public function delete_categorie($id){
        $role = Categories::findOrFail($id);

        $role->delete();

        return ['message' =>'Role supprimé'];
    }

    //=============================== CRUD TABLE COLLECTIONS =============================================//

    public function collection_list(){
        $title = "Liste collection ";
        return view('backend/collection')->with(['title'=>$title]);
    }

    public function add_collection(Request $request){
        
        Collections::create([
            'titre'=>$request->intitule, 
            'publish'=>$request->statut,
            'description'=>$request->description,
            'slug'=>Str::slug($request->intitule),
            'popular'=>$request->popular,
            'categorie_id'=>$request->categorie
        ]);
    }

    public function update_collection(Request $request, $id){
        $role = Collections::findOrFail($id);
        $role->titre = $request->intitule;
        $role->publish =$request->statut;
        $role->description = $request->description;
        $role->slug = Str::slug($request->intitule);
        $role->popular = $request->popular;
        $role->categorie_id = $request->categorie;

        $role->save();
        return ['message' =>'Role modifié'];
    }

    public function all_collection(){
        $role= Collections::all();
        return $role->toJson();
    }

    public function delete_collection($id){
        $role = Collections::findOrFail($id);

        $role->delete();

        return ['message' =>'Role supprimé'];
    }

     //=============================== CRUD TABLE USERS =============================================//

     public function users_list(){
        $title = "Liste users ";
        return view('backend/users')->with(['title'=>$title]);
    }

    public function add_users(Request $request){

       // var_dump($request); die();
        
        $user = User::create([
            'name'=>$request->name, 
            'email'=>$request->email, 
            'password'=> Hash::make($request->password),
            'firstname'=>$request->firstname,
            'tel'=>$request->tel,
            'photo'=>'avatar.png',
            'adresse'=>$request->adresse,
            'role_id'=>$request->role,
            
        ]);
        $title=$request->name.' '.$request->firstname;

        if($user->role_id==2){
            Auteur::create([
                'biographie'=>'','titre'=>'','institution'=>'','fonction'=>'','pays'=>'','slug'=>Str::slug($title),'user_id'=>$user->id,'status'=>1
            ]);
        }
    }

    public function update_users(Request $request, $id){
        $role = User::findOrFail($id);
        $role->name = $request->name;
        $role->email =$request->email;
        if($request->password!=""){
            $role->password =Hash::make($request->password);
        }
        
        $role->firstname = $request->firstname;
        $role->tel = $request->tel;
        $role->adresse = $request->adresse;
        $role->role_id = $request->role;

        $role->save();
        return ['message' =>'Role modifié'];
    }

    public function all_users(){
        $role= User::all();
        return $role->toJson();
    }

    public function delete_users($id){
        $role = User::findOrFail($id);

        $role->delete();

        return ['message' =>'Role supprimé'];
    }

    //=============================== CRUD TABLE livre =============================================//

    public function livre_list(){
        $livres = Livres::all();
        $title = "Liste livre ";
        return view('backend/livres')->with(['title'=>$title, 'livres'=>$livres]);
    }

    public function livre_add(){
        $title = "Insertion Livre";

        return view('backend/addlivre')->with(['title'=>$title]);
    }

    public function add_livre(Request $request){
        $popular = 0;
        $publish = 0;
        if($request->popular==True) $popular=1;
        if($request->publish==True) $publish=1;

        // change with save to fix the pbm
        $prod = Livres::create([
            'titre'=>$request->titre,
            'description'=>$request->description,
            'price'=>$request->price,
            //'genre_id'=>$request->genre,
            'publish'=>$publish,
            'popular_livre'=>$popular,
            //'views_count'=>0,
            'slug'=> Str::slug($request->titre),
            'statut'=>$request->statut_stock
        ]);


        if($request->categories){
            foreach ($request->categories as $cat){
                $prod->collections()->attach($cat);
            }
        }

        if($request->couleurs){
            foreach ($request->couleurs as $c){
                $a = Auteur::where('user_id', $c)->first();
                $prod->auteurs()->attach($a->id);
            }
        }
        




        $images = $request->file('images');
        if($images){
            foreach($images as $image){

                $file_extension = $image->getClientOriginalExtension();
                $filename = Str::random() . '.' . $file_extension;
                //$imgPath = Storage::put('Posts/' . $filename, (string) file_get_contents($image), 'public');
                $imgPath = Storage::disk('public')->put('Posts/' . $prod->id, $image);
                ImagesLivre::create([
                    'images_livres'=>$imgPath,
                    'livre_id'=>$prod->id,
                ]);
            }

        }


        return "ok";
    }

    /**
     * CRUD TABLE NEWS
     */

    public function news_list(){
        $livres = News::all();
        $title = "Liste news ";
        return view('backend/news')->with(['title'=>$title, 'livres'=>$livres]);
    }

    public function news_add(){
        $title = "Insertion news";
       

        return view('backend/addnews')->with(['title'=>$title]);
    }

    public function add_news(Request $request){
       // $popular = 0;
        $publish = 0;
        //if($request->popular==True) $popular=1;
        if($request->publish==True) $publish=1;

        $image = $request->get('images');

        $exploded = explode(',', $image);

       // var_dump($exploded); die();

        if( Str::contains($exploded[0], 'jpg')){
                $ext = 'jpg';

        }elseif(Str::contains($exploded[0], 'jpeg')){
            $ext = 'jpeg';
        }elseif(Str::contains($exploded[0], 'png')){
            $ext = 'png';
        }elseif(Str::contains($exploded[0], 'gif')){
            $ext = 'gif';
        }

        $decode = base64_decode($exploded[1]);

        $filename = Str::random().'.'.$ext;

        $path = \public_path()."/news/".$filename;

        file_put_contents($path, $decode);

       // var_dump($image); die();
        

       

        News::create([
            'titre'=>$request->titre,
            'description'=>$request->description,
            'img_news'=>$filename,
            'user_id'=>Auth::user()->id,
            'status'=>$publish,
            'slug'=>Str::slug($request->titre),
        ]);
        
           


        return "ok";
    }

}
