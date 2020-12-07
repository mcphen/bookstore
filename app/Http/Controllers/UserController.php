<?php

namespace App\Http\Controllers;

use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'firstname' => $data['firstname'],
            'tel' => $data['tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' =>2
        ]);
        
        return $user;
    }

    public function ajout(Request $request){

        //var_dump($request); die();
        $user = User::create([
            'name' => $request->name,
            'firstname' => $request->firstname,
            'tel' => $request->tel,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' =>2
        ]);

        
        return $user;
    }

    //Manual Authentication
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try{
            if (Auth::attempt($credentials)) {
                // Authentication passed...
                //return redirect()->intended('dashboard');
                return Auth::user();
            }
        }catch (Exception $e){
            throw $e;
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
