<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TimeCardController extends Controller
{
    public function index (Request $request,$id)
    {
        $shop = $id;

        return view('timecard.index',compact('shop'));
    }
}
