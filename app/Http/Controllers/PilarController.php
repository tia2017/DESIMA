<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use App\Pilar;

class PilarController extends Controller
{

    public function __construct()
    {
        if(!Session::get('login')){
            return redirect('auth/login')->with('alert','Kamu harus login dulu');
        }
    }

    public function index()
    {
        if(!Session::get('login')){
            return redirect('/')->with('alert','Kamu harus login dulu');
        }
        else{
            $df_pilar = Pilars::query()->get(['*']);

            return view('pilars.index', compact('df_pilar'));
        }
        
    }

    public function create()
    {
        $df_pilar = Pilars::get();

        return view('pilars.create', compact('df_pilar'));
    }

    public function store(Request $request){
        
        $this->validate($request,[
    		'name' => 'required',
        ]);

        Pilars::create([
    		'name' => $request->name,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
    	]);
        
        return redirect('pilars');
    }

    public function edit($id)
    {

        $df_pilar = Pilars::find($id);

        return view('pilars.update', compact('df_pilar')); 
    }

    public function update($id,Request $request)
    {
        $this->validate($request,[
            'name' => 'required'
         ]);

         $pilars = Pilars::find($id);
         $pilars->name = $request->name;
         $pilars->save();
         return redirect('/pilars');
    }

    public function delete($id)
    {
        $pilars = Pilars::find($id);
        $pilars->delete();
        return redirect('/pilars');
    }




}
