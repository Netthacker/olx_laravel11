<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\State;

class StatesController extends Controller
{
    public function index(Request $request){
        $states = State::list();
        return response()->json(['data'=>$states], 200);
    }

    public function store(Request $request){
        $data = $request->only(['name','slug']);
        $state = State::create($data);
        $response = [
            'error' =>'',
            'message'=>'Estado criado correctamente.'
        ];

        return response()->json($response);
    }
}
