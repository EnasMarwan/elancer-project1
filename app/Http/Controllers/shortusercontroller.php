<?php

namespace App\Http\Controllers;

use App\Models\shorturl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class shortusercontroller extends Controller
{
    public function index(){
        //$urls=auth()->user()->urls;
        $urls = Auth::user()->urls()->paginate('4');

        return view('urls.index' , compact('urls'));
    }

    public function destroy($id)
    {
        shorturl::destroy($id); 

        return redirect('/url')
            ->with('success', 'url deleted!');

    }
}
