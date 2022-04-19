<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PunchClockRequest;
use App\Consts\WorkStatusConst;
use App\Models\Shop;
use App\Models\WorkRecord;
use DateTime;
use Illuminate\Support\Facades\Session;

class TimeCardController extends Controller
{

    private $work_record;
    private $date_time;

    public function __construct()
    {
        $this->work_record = new WorkRecord();
        $this->date_time   = new DateTime();
    }

    public function index (Request $request,$shop_code,$message=null)
    {
        $shop_id = Shop::ShopCodeEqual($shop_code)->value('id');

        $userList = Shop::find($shop_id)->users;

        foreach($userList as $user){
            $user->input_url   = route('timecard.input',[ 'shop_code' => $shop_code ,'id' => $user->id ]);
            $user->work_start  = $this->work_record->getDisplayPunchTime($shop_id,$user->id,WorkStatusConst::WORK_START);
            $user->work_end    = $this->work_record->getDisplayPunchTime($shop_id,$user->id,WorkStatusConst::WORK_END);
            $user->break_start = $this->work_record->getDisplayPunchTime($shop_id,$user->id,WorkStatusConst::BREAK_START);
            $user->break_end   = $this->work_record->getDisplayPunchTime($shop_id,$user->id,WorkStatusConst::BREAK_END);
        }

        return view('front.index',compact('userList','message'));
    }

    public function input (Request $request,$shop_code,$user_id)
    {
        // 全画面に戻る用のURL
        $index_url = route( 'timecard.index' ,[ 'shop_code' => $shop_code ]);

        $shop_id = Shop::ShopCodeEqual($shop_code)->value('id');

        $work_status = WorkStatusConst::STATUS;

        $button_is_enable = array();
        foreach($work_status as $status){
            // 出勤系ボタンのURL
            $work_status[$status['id']]['button_url'] = route( $status['route'] ,[ 'shop_code' => $shop_code ] );

            // データベース内の出勤状況を取得
            if( $this->work_record->isExistWorkRecord($shop_id,$user_id,$status['id']) ){
                array_push($button_is_enable,1);
            }else{
                array_push($button_is_enable,0);
            }
        }


        if( $button_is_enable === array(0,0,0,0) ){
            // 未出勤
            $work_status[0]['enable'] = true;
            $work_status[1]['enable'] = false;
            $work_status[2]['enable'] = false;
            $work_status[3]['enable'] = false;
        }elseif( $button_is_enable === array(1,0,0,0) ){
            // 出勤中
            $work_status[0]['enable'] = false;
            $work_status[1]['enable'] = true;
            $work_status[2]['enable'] = false;
            $work_status[3]['enable'] = true;
        }elseif( $button_is_enable === array(1,1,0,0) ){
            // 休憩中
            $work_status[0]['enable'] = false;
            $work_status[1]['enable'] = false;
            $work_status[2]['enable'] = true;
            $work_status[3]['enable'] = false;
        }elseif( $button_is_enable === array(1,1,1,0) ){
            // 退勤待ち
            $work_status[0]['enable'] = false;
            $work_status[1]['enable'] = false;
            $work_status[2]['enable'] = false;
            $work_status[3]['enable'] = true;
        }
        // dd($work_status);
        return view('front.input',compact('index_url','user_id','work_status'));
    }


    /**
     * [打刻]
     * 
     */
    public function workStart (PunchClockRequest $request,$shop_code)
    {
        $user_id = $request->user_id;
        $shop_id = Shop::ShopCodeEqual($shop_code)->value('id');

        $this->work_record->createPunchTime($shop_id,$user_id,WorkStatusConst::WORK_START);

        Session::flash('notification','出勤しました');
        return redirect( route( 'timecard.index' ,[ 'shop_code' => $shop_code ]) );

    }

    public function breakStart(PunchClockRequest $request,$shop_code)
    {
        $user_id = $request->user_id;
        $shop_id = Shop::ShopCodeEqual($shop_code)->value('id');

        $this->work_record->createPunchTime($shop_id,$user_id,WorkStatusConst::BREAK_START);

        Session::flash('notification','休憩開始しました');
        return redirect( route( 'timecard.index' ,[ 'shop_code' => $shop_code ]) );
    }

    public function breakEnd(PunchClockRequest $request,$shop_code)
    {
        $user_id = $request->user_id;
        $shop_id = Shop::ShopCodeEqual($shop_code)->value('id');

        $this->work_record->createPunchTime($shop_id,$user_id,WorkStatusConst::BREAK_END);

        Session::flash('notification','休憩終了しました');
        return redirect( route( 'timecard.index' ,[ 'shop_code' => $shop_code ]) );
    }

    public function workEnd(PunchClockRequest $request,$shop_code)
    {
        $user_id = $request->user_id;
        $shop_id = Shop::ShopCodeEqual($shop_code)->value('id');

        $this->work_record->createPunchTime($shop_id,$user_id,WorkStatusConst::WORK_END);

        Session::flash('notification','退勤しました');
        return redirect( route( 'timecard.index' ,[ 'shop_code' => $shop_code ]) );
    }
}
