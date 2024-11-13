<?php

namespace App\Http\Requests\authens;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        'name' => 'required',
        'user_name' => 'required|unique:users,user_name',
        'email' => 'required|email|max:255|unique:users,email',
        'phone' => 'required|max:10',
        'password' => 'required|min:8|max:100',
        'password_confirmation' => 'required|same:password',
    ];
}

public function messages()
{
    return [
        'name.required' => 'Tên người dùng là bắt buộc.',
        'user_name.required' => 'Tài khoản người dùng là bắt buộc.',
        'user_name.unique' => 'Tài khoản người dùng đã tồn tại.',
        'email.required' => 'Vui lòng nhập Email.',
        'email.unique' => 'Email đã tồn tại.',
        'email.max' => 'Tài khoản Email quá dài không hợp lệ.',
        'phone.required' => 'Số điện thoại là bắt buộc.',
        'phone.max' => 'Số điện thoại nhập tối đa là 10 số.',
        'password.required' => 'Vui lòng nhập mật khẩu.',
        'password.min' => 'Vui lòng nhập mật khẩu dài hơn 8 kí tự.',
        'password.max' => 'Mật khẩu quá dài.',
        'password_confirmation.required' => 'Nhập lại mật khẩu là bắt buộc.',
        'password_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
    ];
}
}
