<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Message;
use App\Events\NewMessageNotification;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = Auth::user()->id;
        $data = array('user_id' => $user_id);

        return view('broadcast', $data);
    }

    public function send()
    {
        // ...

        // 创建消息
        $message = new Message;
        $message->setAttribute('from', 2);
        $message->setAttribute('to', 1);
        $message->setAttribute('message', 'Demo message from user 1 to user 2');
        $message->save();

        // 将 NewMessageNotification 加入到事件
        event(new NewMessageNotification($message));

        // ...
    }
}