<?php

namespace App\Http\Controllers\Tree;

use App\Models\Post;
use App\Resources\PostResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PostController extends Controller
{
    //
    public function index(Request $request)
    {
    	//  select()
    	$res = Post::columns()->get();
    	// 
    	return $all = PostResource::make($res);
    	dd($all);
    }
}
