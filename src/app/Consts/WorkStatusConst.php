<?php
namespace App\Consts;

class WorkStatusConst
{
    const WORK_START  = 0;
    const BREAK_START = 1;
    const BREAK_END   = 2;
    const WORK_END    = 3;

    const STATUS = [
        self::WORK_START  => '出勤',
        self::BREAK_START => '休憩開始',
        self::BREAK_END   => '休憩終了',
        self::WORK_END    => '退勤',
    ];

}