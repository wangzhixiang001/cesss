<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\User;
use App\Exceptions\FindException;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;


class Test extends Controller
{
    /**
     * Handle the incoming request.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {

// 自动为文件名生成唯一的ID...
        Storage::putFile('photos', new File('/path/to/photo'));

// 手动指定文件名...
        Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg');

        throw new FindException('asa');
        // abort(403, 'Unauthorized action.');
        // abort(404);
       User::findOrFail(1);
        // $private_key = storage_path('framework/key/private_key.pem');
        // $public_key = storage_path('framework/key/public_key.pem');
        // $res = exec('openssl genrsa -out '.$private_key.' 2048');
        // exec('openssl rsa -in '.$private_key.' -pubout -out '.$public_key);
        // dd($res);
       return view('test');
    }
}
