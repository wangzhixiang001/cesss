<?php

namespace App\Http\Controllers;

use App\Notifications\DatabaNotification;
use App\Notifications\InvoicePaid;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class NotifiableController extends Controller
{
    //
    public function index(Request $request)
    {

        $user = User::find(1);
        $when = now()->addMinutes(10);
        // 延迟通知
        $user->notify((new InvoicePaid([1]))->onConnection('redis')->onQueue('InvoicePaid')->delay($when));
        dd('SUCCESS');
    }

    public function allUser()
    {
        $users = User::all();
        Notification::send($users, new InvoicePaid([1]));
        dd('SUCCESS');
    }

    public function route()
    {
        Notification::route('mail', 'taylor@example.com')
            ->route('nexmo', '5555555555')
            ->notify(new InvoicePaid('a'));
        dd('SUCCESS');
    }

    public function routeUser($mail)
    {
        echo 'a';
    }

    public function datebaseNotifiable()
    {
        $user = User::find(1);
        $user->notify((new DatabaNotification(['id' => 99, 'name' => 'wangzhixiang'])));
        dd('SUCCESS');
    }

    public function unDatabaseNotifiable()
    {
        $user = User::find(1)->notifications;
        dd($user);
    }
}
