<?php

namespace App\Http\Controllers\Tree;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Resources\PostResource;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function index(Request $request)
    {
        $handle = function () {
            echo '当前要执行的程序!';
        };

        $pipe_arr = [
            'VerfiyCsrfToekn',
            'VerfiyAuth',
            'SetCookie',
        ];

        $callback = array_reduce($pipe_arr, function ($stack, $pipe) {
        	
            return function () use ($stack, $pipe) {
                return $pipe::handle($stack);
            };
        }, $handle);
        var_dump($callback);die;
        //  select()
        $res = Post::columns()->get();
        //
        return $all = PostResource::make($res);
        dd($all);

    }

}
