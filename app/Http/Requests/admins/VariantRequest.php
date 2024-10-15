<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class VariantRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Tên biến thể là bắt buộc.',
            'name.string' => 'Tên biến thể phải là chuỗi ký tự.',
            'name.max' => 'Tên biến thể không được vượt quá 255 ký tự.',
        ];
    }
}
