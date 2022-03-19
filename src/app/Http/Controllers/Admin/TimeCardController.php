<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Shop;

class TimeCardController extends Controller
{
    public function index (Request $request,$id)
    {
        $shop = $id;

        $emloyeeList = Shop::find($shop)->employees;

        return view('timecard.index',compact('emloyeeList'));
    }
}
