<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathAPIController extends Controller
{
    //
    public function index(Request $request)
    {

        dd($request->all());
        return ["hello"=>'json'];
    }
}
