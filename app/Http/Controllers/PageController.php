<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function index(){
        
        $title = 'SISTEM PENDATAAN ASET INTERNAL';
        if(Auth::user()){
            return view('pages.index2')->with('title', $title);
        }
        
        //return view('pages.index', compact('title'));
        return view('pages.index')->with('title', $title);
    }

    public function about(){
        $title = 'About Us';
        return view('pages.about')->with('title',$title);
    }
}
