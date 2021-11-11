<?php

namespace App\Http\Controllers;

use App\Models\click;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\shorturl;
use DeviceDetector\Parser\Client\Browser;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use hisorange\BrowserDetect\Parser as Browserr;

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

        if($request->longurl){
            if(auth()->user()){
                $shorturl =auth()->user()->urls()->create([
                    'longurl'=>$request->longurl
                ]);
            }else{
                $shorturl =shorturl::create([
                    'longurl' =>$request->longurl
                ]);
            }
            if($shorturl){
                $shorturl->update([
                    'shorturl'=>str::random(10)
                ]);
            }
        }
        /*$shorturl = new shorturl();
        $shorturl->longurl = $request->input('longurl');
        $shorturl->shorturl = str::random(10);
        $shorturl->save();*/

        

        // $ip =$request->ip();
        // $browser =$request->get_browser();
    


        session()->flash('success', 'Shorten Link Generated Successfully! ');
        return view('index' , [
            'shorturl' =>$shorturl
        ]);
    }

    public function show($shorturl){

        $shortlink=shorturl::where('shorturl' , '=' , $shorturl);

        if($shortlink -> exists()){
            
            click::create([
                'ip' => request()->ip(),
                'shorturl_id' => $shortlink->value('id'),
                'browser' => Browserr::browserFamily(),
            ]);

           // BrowserDetect::browserName(), 
          // Browser::browserFamily()
             $shortlink->increment('clicks');

           

            return redirect($shortlink->value('longurl'));
        }
       else{
           return 'not exists';
       }

    }

    public function showclick($id){

        $shorturl =shorturl::where('id',$id)->first();
        $clicks = $shorturl->clicks()->paginate('5');
        return view('showclick',[
            'clicks' => $clicks,
            'shorturl' => $shorturl,
        ]);

    }
    

    

    
}


