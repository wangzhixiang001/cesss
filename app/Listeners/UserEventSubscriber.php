<?php

namespace App\Listeners;

class UserEventSubscriber
{
    /**
     * 处理用户登录事件。
     */
    public function onUserLogin($event) {
        info('ceshi');
        info($event->order);
    }

    /**
     * 处理用户注销事件。
     */
    public function onUserLogout($event) {}

    /**
     * 为订阅者注册监听器
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     */
    public function subscribe($events)
    {
        $events->listen(
            'App\Events\OrderShipped',
            'App\Listeners\UserEventSubscriber@onUserLogin'
        );

        $events->listen(
            'Illuminate\Auth\Events\Logout',
            'App\Listeners\UserEventSubscriber@onUserLogout'
        );
    }
}