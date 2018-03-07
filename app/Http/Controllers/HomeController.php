<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Aset;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->id=='1'){
            $users = User::all();
            $asets = Aset::all();
            return view('adminhome', compact('users','asets'));     
        }
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('home')->with('asets',$user->asets);
        
    }
}
