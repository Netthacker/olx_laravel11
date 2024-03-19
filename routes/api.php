<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/teste', function () {
    $data['message'] = "HELLO WORLD";
    return response()->json($data,200);
});

