<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Collections;
use App\Roles;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        
        User::create([
            'name'=>$request->name, 
            'email'=>$request->email, 
            'password'=> Hash::make($request->password),
            'firstname'=>$request->firstname,
            'tel'=>$request->tel,
            'photo'=>'avatar.png',
            'adresse'=>$request->adresse,
            'role_id'=>$request->role,
            
        ]);
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

    //=============================== CRUD TABLE USERS =============================================//

    public function livre_list(){
        $title = "Liste livre ";
        return view('backend/livres')->with(['title'=>$title]);
    }

}
