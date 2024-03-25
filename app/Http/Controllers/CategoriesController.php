<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request){
        $categories = Category::list();
        return response()->json(['data'=>$categories], 200);
    }
}
