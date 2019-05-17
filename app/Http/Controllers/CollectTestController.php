<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CollectTestController extends Controller
{
    //
    public function now()
    {
        echo now()->addMinutes(10);
    }
}
