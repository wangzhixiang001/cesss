<?php

namespace App\Http\Controllers\Cache;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class CacheTestcontroller extends Controller
{
    //
    public function lock()
    {	
    	
    	$lock = Cache::lock('foo');
    
		if ($lock->get()) {
		    //获取锁定10秒...
			sleep(50);
		    $lock->release();
		}
		dump('结束');
    }
}
