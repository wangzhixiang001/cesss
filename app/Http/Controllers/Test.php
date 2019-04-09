<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class Test extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // $private_key = storage_path('framework/key/private_key.pem');
        // $public_key = storage_path('framework/key/public_key.pem');
        // $res = exec('openssl genrsa -out '.$private_key.' 2048');
        // exec('openssl rsa -in '.$private_key.' -pubout -out '.$public_key);
        // dd($res);
       return view('test');
    }
}
