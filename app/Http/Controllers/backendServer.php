<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\message;

class backendServer extends Controller
{
    public function index(){
        return view('index');
    }

    public function unauthenticatedRoute(Request $request){    
        if(Cache::has($request->key)){
            return response()->json("data",403);
        }else{
            $parameters[]  =
                    [
                            'key'           =>  $request->key,
                            'shared_secret' =>  $request->shared_secret
                    ];
                    
            Cache::add($request->key,$parameters,20);
            return response()->json('',204);
            
        }
       
    }

    public function authenticatedMessage(Request $request){
        
        $messages = new message;
        $messages->msg = $request->msg;
        $messages->tags = $request->tag;
        $messages->save();

        $id_new = $messages->id;


        return response()->json($id_new,200);
    }

    public function messagefindId($key){
        $data = message::where('id','=',$key)->get();
        return response()->json($data,200);
    }

    public function messagefindTags($tags){
        
        $data = message::where('tags','=',$tags)->get();
        return response()->json($data,200);
    }
} 
