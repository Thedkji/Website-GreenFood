<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
    public function rules()
    {
        return [
            'fullName' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'province' => 'required|string|max:100',
            'district' => 'required|string|max:100',
            'ward' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15',
        ];
    }

    public function messages()
    {
        return [
            'fullName.required' => 'Địa chỉ không được để trống.',
            'address.required' => 'Địa chỉ không được để trống.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email phải đúng định dạng.',
            'phone.required' => 'Số điện thoại không được để trống.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
        ];
    }
}
