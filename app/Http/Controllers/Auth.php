<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use App\User;

class Auth extends Controller
{
    public function index()
    {

    }

    public function login(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $data = User::where('email',$email)->first();

        if($data){
            if(Hash::check($password,$data->password)){
                Session::put('name',$data->name);
                Session::put('role',$data->role_id);
                Session::put('login',TRUE);
                return redirect('dashboard');
            }
            else{
                return redirect('/')->with('alert','Password Salah !');
            }
        }
        else{
            return redirect('/')->with('alert','Email tidak ditemukan!');
        }
    }

}
