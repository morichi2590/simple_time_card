<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Consts\WorkStatusConst;
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


    /**
     * [打刻]
     * 
     */
    public function punchClock (Request $request)
    {
        // 出勤退勤か休憩

        // 出勤の場合
        // 同一日付でレコードがない、または退勤がある場合はinsert
        // 同一日付でレコードがある場合、update

        // 休憩開始の場合
        // 同一日付のレコードを取得し、update
        // 同一日付のレコードを取得がない場合、insert

        // 休憩終了の場合
        // 同一日付のレコードを取得し、update        
        // 同一日付のレコードを取得がない場合、insert

        // 退勤の場合
        // 同一日付でレコードがある場合、update
        // 同一日付のレコードを取得がない場合、insert

        // 日跨ぎ退勤の場合
        

    }
}
