<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepwdRequest extends FormRequest
{
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
            'password'=>'required|regex:/\w{6,18}/',
            //重复密码规则
            'repassword'=>'required|regex:/\w{6,18}/|same:password',
        ];
    }

    //自定义错误消息
    public function messages(){
        return [
            //自定义规则错误消息
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码必须是6-18的任意的数字字母或者下划线',
            
            'repassword.required'=>'重复密码不能为空',
            'repassword.regex'=>'重复密码必须是6-18的任意的数字字母或者下划线',
            'repassword.same'=>'两次密码不一致',
        ];
    }
}
