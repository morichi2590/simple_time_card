<?php
namespace App\Consts;

class WorkStatusConst
{
    const WORK_START  = 0;
    const BREAK_START = 1;
    const BREAK_END   = 2;
    const WORK_END    = 3;

    const STATUS = 
    [
        self::WORK_START =>
        [
            'id'          => self::WORK_START,
            'key'         => 'work-start',
            'label'       => '出勤',
            'label_short' => '出勤',
            'route'       => 'timecard.work-start'
        ],
        self::BREAK_START => 
        [
            'id'          => self::BREAK_START,
            'key'         => 'break-start',
            'label'       => '休憩開始',
            'label_short' => '休開',
            'route'       => 'timecard.break-start'
        ],
        self::BREAK_END => 
        [
            'id'          => self::BREAK_END,
            'key'         => 'break-end',
            'label'       => '休憩終了',
            'label_short' => '休終',
            'route'       => 'timecard.break-end'
        ],
        self::WORK_END => 
        [
            'id'          => self::WORK_END,
            'key'         => 'work-end',
            'label'       => '退勤',
            'label_short' => '退勤',
            'route'       => 'timecard.work-end'
        ],
    ];

}