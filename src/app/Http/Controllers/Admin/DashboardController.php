<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shop;


class DashboardController extends Controller
{
    public function index ()
    {
        $tenant_id = Auth::user()->tenant_id;
        $shopList = Shop::where('tenant_id',$tenant_id)->get();
        return view('dashboard',compact('shopList'));
    }
}
