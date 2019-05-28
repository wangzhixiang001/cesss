<?php

namespace App\Resources;

use Weiwenhao\TreeQL\Resource;

class PostResource extends Resource
{
    protected $default = [
        'id',
        'title',
        // 'user_id'
    ];
    // 字段
    protected $columns = [
        'id',
        'title',
        'user_id',
        'content',

    ];
    // 模型关联
    protected $relations = [
        // 'comments',
        // 'user'
    ];
    // 属性计算
    protected $custom = [
        'liked',
    ];
    //  额外字段
    protected $meta = [

    ];

    public function liked()
    {
        return array_random([true, false]);
    }
}
