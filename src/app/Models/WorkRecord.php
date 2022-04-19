<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DateTime;

class WorkRecord extends Model
{
    use HasFactory,SoftDeletes;

    private $date_time; 
    private $change_time;

    public function __construct()
    {
        $this->date_time   = new DateTime();
        $this->change_time = 'Y-m-d 05:00:00';
    }


    /*
    |--------------------------------------------------------------------------
    | scope erea
    |--------------------------------------------------------------------------
    |
    |
    */

    public function scopeShopIdEqual($query, $shop_id)
    {
        return $query->where('shop_id',$shop_id);
    }

    public function scopeUserIdEqual($query, $user_id)
    {
        return $query->where('user_id',$user_id);
    }

    public function scopeWorkStatusEqual($query, $work_status)
    {
        return $query->where('work_status',$work_status);
    }

    public function scopeWorkDateEqual($query, $work_date)
    {
        return $query->where('work_date',$work_date);
    }


    /*
    |--------------------------------------------------------------------------
    | method erea
    |--------------------------------------------------------------------------
    |
    |
    */

    public function createPunchTime($shop_id,$user_id,$work_status)
    {
        $this->shop_id     = $shop_id;
        $this->user_id     = $user_id;
        $this->work_date   = $this->date_time->format('Y-m-d');
        $this->work_status = $work_status;
        $this->punch_clock = $this->date_time->format('Y-m-d H:i:s');
        $this->save();
    }

    public function isExistWorkRecord ($shop_id,$user_id,$work_status)
    {        
        return $this->query()
            ->ShopIdEqual($shop_id)
            ->UserIdEqual($user_id)
            ->WorkStatusEqual($work_status)
            ->WorkDateEqual( $this->date_time->format('Y-m-d') )
            ->exists();
    }

    public function isOverChangeTime ()
    {
        return $this->date_time->format('Y-m-d H:i:s') < $this->date_time->format($this->change_time);
    }

    public function getPunchTime ($shop_id,$user_id,$work_status,$reference_time)
    {
        return $this->query()
            ->ShopIdEqual($shop_id)
            ->UserIdEqual($user_id)
            ->WorkStatusEqual($work_status)
            ->where('punch_clock','>', $reference_time )
            ->value('punch_clock');
    }

    public function getDisplayPunchTime ($shop_id,$user_id,$work_status)
    {

        if( $this->isOverChangeTime() ){
            // 前日分から取得
            $reference_time = date($this->change_time, strtotime("-1 day"));
        }else{
            // 今日の分から取得
            $reference_time = $this->date_time->format($this->change_time);
        }

        $punch_clock = $this->getPunchTime($shop_id,$user_id,$work_status,$reference_time);

        if( $punch_clock ){
            return date( "H:i", strtotime($punch_clock) );
        }else{
            return '--:--';
        }
    }

}
