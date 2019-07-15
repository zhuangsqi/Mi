<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomePhoneRequest extends FormRequest
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
            //用户验证规则不能为空 多个规则用 | 隔开
            //密码规则
            'password'=>'required|regex:/\w{6,18}/',
            //重复密码规则
            'repassword'=>'required|regex:/\w{6,18}/|same:password',
            //电话
            'phone'=>'required|regex:/\d{11}/|unique:adminuser',
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
            
            
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'请输入正确的手机号',
            'phone.unique'=>'这个手机号已被注册',
        ];
    }
}