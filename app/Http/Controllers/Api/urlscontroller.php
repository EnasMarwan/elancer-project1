<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\shorturl;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class urlscontroller extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index','show']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries=shorturl::latest()->with('user:id,name')->paginate();
        return $entries;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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

        return $shorturl;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        return shorturl::with('user:id,name')->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    } 
}
