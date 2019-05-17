<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ErrorTestController extends Controller
{
    //错误转换为异常处理 
    public function handler()
    {
    	// 设置异常函数
    	set_error_handler('ceshi');
    	echo($error);
    }
}
