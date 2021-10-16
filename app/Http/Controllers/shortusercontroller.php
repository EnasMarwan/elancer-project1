<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class shortusercontroller extends Controller
{
    public function index(){
        $urls=auth()->user()->urls;

        return view('urls.index' , compact('urls'));
    }
}
