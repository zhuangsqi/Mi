<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeLoginRequest extends FormRequest
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
            'name'=>'required|exists:adminuser',
            //密码规则
            'password'=>'required',
        ];
    }

     //自定义错误消息
    public function messages(){
        return [
            //自定义规则错误消息
            'name.required'=>'用户名不能为空',
            'name.exists'=>'用户名或密码不正确!',
            'password.required'=>'密码不能为空',
            
        ];
    }
}
