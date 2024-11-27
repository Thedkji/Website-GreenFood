<?php

namespace App\Http\Requests\clients;

use Illuminate\Foundation\Http\FormRequest;

class PassRequest extends FormRequest
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
            
                'password' => 'required|min:8', // confirmed: kiểm tra password và password_confirmation
                'password_confirmation'=> 'required|min:8',
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password_confirmation.required' => 'Mật khẩu nhập lại là bắt buộc.',

        ];
    }
}
