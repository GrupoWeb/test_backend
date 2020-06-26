<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class backendServer extends Controller
{
    public function unauthenticatedRoute(Request $request){
        $parameters[] = [
            'key'               => 'test',
            'shared_secret'     => 'test'
        ];

        foreach ($parameters as $data) {
            if($request->key == $data['key']){
                return response()->json("data",403);
            }else{
                array_push($parameters,[
                    [
                        'key'           =>  $request->key,
                        'shared_secret' =>  $request->shared_secret
                    ]
                ]);
                return response()->json('',204);
                
            }
        }
    }
} 
