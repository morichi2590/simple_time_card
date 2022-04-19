<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use App\Models\WorkRecord;

class PunchClockRequest extends FormRequest
{
    private $user; 
    private $work_record;

    public function __construct()
    {
        $this->user        = new User();
        $this->work_record = new WorkRecord();
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'pin'     => 'required',
            'user_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            '*.required' => '正しいPINを入力してください',
        ];
    }

    public function withValidator($validator)
    {
        $shop_id     = $this->input('shop_id');
        $user_id     = $this->input('user_id');
        $pin         = $this->input('pin');
        $work_status = $this->input('submit');

        $is_exist_user        = $this->user->isExistUserPin($user_id,$pin);
        $is_exist_work_record = $this->work_record->isExistWorkRecord($shop_id,$user_id,$work_status);

        $validator->after(function ($validator) use($is_exist_user,$is_exist_work_record) {
            if( !$is_exist_user ) {
                $validator->errors()->add('pin', '正しいPINを入力してください');
            }

            if( $is_exist_work_record ){
                $validator->errors()->add('pin', '重複勤怠です');
            }
        });
    }

}
