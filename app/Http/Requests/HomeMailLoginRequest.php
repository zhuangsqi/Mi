<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeMailLoginRequest extends FormRequest
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
            'email'=>'required|email|exists:adminuser',
            //密码规则
            'password'=>'required',
        ];
    }

     public function messages(){
        return [
            //自定义规则错误消息
            'email.required'=>'账号不能为空',
            'email.exists'=>'账号或密码不正确!',
            'password.required'=>'密码不能为空',
            
        ];
    }
}
