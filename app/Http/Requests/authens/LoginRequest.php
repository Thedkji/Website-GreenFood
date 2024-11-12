<?php

namespace App\Http\Requests\authens;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            // 'email' => ['required', 'email', 'max:255'],
            'user_name' => ['required'],
            'password' => ['required', 'min:8', 'max:100']
        ];
    }


    public function messages()
    {
        return [
            // 'email.required' => 'Vui lòng nhập Email',
            // 'email.max' => 'Tài khoản Email quá dài không hợp lệ ',
            'user_name.required' => 'Vui lòng nhập tên đăng nhập',
            // 'user_name.confirmed' => 'Tên đăng nhập không tồn tại',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu dài hơn 8 kí tự ',
            'password.max' => 'Mật khẩu quá dài ...'
        ];
    }
}
