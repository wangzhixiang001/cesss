<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $data = DB::table('ceshi')->get();

        foreach ($data as $key => $v) {
            $one = DB::table('loans_city')->where('title', $v->one)->where('parent_id', 0)->first();

            if (empty($one)) {
                DB::table('loans_city')->insert(['title' => $v->one, 'parent_id' => 0, 'order' => 0]);
                $one = DB::table('loans_city')->where('title', $v->one)->where('parent_id', 0)->first();
            }

            $two = DB::table('loans_city')->where('title', $v->two)->where('parent_id', $one->id)->first();

            if (empty($two)) {
                DB::table('loans_city')->insert(['title' => $v->two, 'parent_id' => $one->id, 'order' => 0]);
                $two = DB::table('loans_city')->where('title', $v->two)->where('parent_id', $one->id)->first();
            }

            $three = DB::table('loans_city')->where('title', $v->three)->where('parent_id', 0)->first();

            if (empty($three)) {
                DB::table('loans_city')->insert(['title' => $v->three, 'parent_id' => $two->id, 'order' => 0, 'addr' => $v->addr, 'name' => $v->name, 'phone' => $v->phone]);

            }

        }
    }
}
