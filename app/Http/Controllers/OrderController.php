<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\OrderShipped;
use App\Models\Order;


class OrderController extends Controller
{
    //
    public function index()
    {
    	$order = Order::findOrFail(1);

    	// 订单发货逻辑 ...
    	event('wocao',[1,2]);
    	
    	event(new OrderShipped($order));

    	dd('SUCCESS');
    }
}
