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
        $shopList = Shop::TenantIdEqual(Auth::user()->tenant_id)->get();
        foreach($shopList as $shop){
            $shop->timecard_url = route( 'timecard.index' ,[ 'shop_code' => $shop->shop_code ]);
        }
        return view('dashboard',compact('shopList'));
    }
}
