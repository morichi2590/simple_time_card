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

        $user = Shop::find($shop)->employees;
        dd($user);

        return view('timecard.index',compact('shop'));
    }
}
