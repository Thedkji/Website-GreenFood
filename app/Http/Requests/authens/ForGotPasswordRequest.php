<?php

namespace App\Http\Requests\authens;

use Illuminate\Foundation\Http\FormRequest;

class ForGotPasswordRequest extends FormRequest
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
            'email' => 'required|exists:users,email', // Sửa lại rules phù hợp
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Vui lòng nhập Email.',
            'email.exists' => 'Email không tồn tại trong hệ thống.', // Thông báo hợp lý hơn
        ];
    }
}
