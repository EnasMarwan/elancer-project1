<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\shorturl;
use Illuminate\Support\Str;


class shorturlscontroller extends Controller
{
    public function index(){

       // $flashMessage = Session::get('success', false);

        return view('index');

    }

    public function store(Request $request){

        $request->validate([
            'longurl' => 'required|url'
         ]);

        $shorturl = new shorturl();
        $shorturl->longurl = $request->input('longurl');
        $shorturl->shorturl = str::random(10);
        $shorturl->save();

        session()->flash('success', 'Shorten Link Generated Successfully! ');
       
    

        return view('index' , [
            'shorturl' =>$shorturl

        ]);
    }

    public function show($shorturl){

        $shortlink=shorturl::where('shorturl' , '=' , $shorturl);

       if($shortlink -> exists()){
        return redirect($shortlink->value('longurl'));
       }
       else{
           return 'not exists';
       }

    }


    
}


