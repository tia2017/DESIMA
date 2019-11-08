<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;


//use App\User;
use App\User; 
use App\Users_Detail; 
use App\Role; 
use App\Institute; 

class UserController extends Controller
{
    public function index()
    {

        $df_user = User::query()
         ->join("roles","roles.id","=","users.role_id")
         ->join("users_detail","users_detail.id","=","users.user_id")
         ->get(['roles.name AS role_name','users.*','users.id as userId']);

    	// return data ke view
    	return view('users.index', compact('df_user'));
    }

    public function create()
    {
        $df_role = Role::get();
        $df_institute = Institute::get();
        return view('users.create', compact('df_role','df_institute'));
    }

    public function store(Request $request){

        
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role_id' => 'required',
            'nik' => 'required',
            'nip' => 'required',
            'name' => 'required',
            'address' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'institute_id' => 'required',
        ]);

        

        $users = Users_Detail::create([
            'nik' => $request->nik,
            'nip' => $request->nip,
            'name' => $request->name,
            'address' => $request->address,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'institute_id' => $request->institute_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        $hasil = User::create([
            'user_id' => $users->id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'remember_token' => '',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        
        return redirect('users');
    }

    public function edit($id)
    {
        $df_user = User::query()
        ->leftJoin("users_detail","users_detail.id","=","users.user_id")
        ->where('users.id', '=', $id)
        ->get(['*','users.id as userId']);

        $df_role = Role::get();
        $df_institute = Institute::get();
        // print_r($df_user);

        return view('users.update', compact('df_user','df_role','df_institute')); 

    }

    public function update($id,Request $request)
    {
        
        $users = User::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->save();

        $details = Users_Detail::find($users->user_id);

        $details->name = $request->name;
        $details->nik = $request->nik;
        $details->nip = $request->nip;
        $details->phone =  $request->phone;
        $details->gender =$request->gender;
        $details->address = $request->address;
        $details->institute_id = $request->institute_id;
        $details->updated_at = date('Y-m-d H:i:s');
        $details->save();

        return redirect('users');
    }

    public function delete($id)
    {
        $users = User::find($id);


        if($this->delete_detail($users->user_id)){
            $users->delete();
        }
        return redirect('/users');
    }

    public function delete_detail($id){
        $details = Users_Detail::find($id);

        $details->delete();

        return true;
    }
    
}
