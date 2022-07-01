<?php

namespace App\Http\Controllers;

use App\Http\Requests\calculateApiRequest;
use App\Library\Math;
use Illuminate\Http\Request;

class MathAPIController extends Controller
{
    //
    public function index(calculateApiRequest $request)
    {

        if (!$request->ajax()) {
            return response(['error' => ['code' => 406, 'message' => 'Invalid API Request']]);
        }


        $usePrecedence=env('USE_PRECEDENCE',false);
        $math = new Math($usePrecedence);
        return [
            'result' => $math
                ->setEquation($request->input('equation'))
                ->getResult()
        ];


    }
}
