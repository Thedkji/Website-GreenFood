<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class VariantDetailRequest extends FormRequest
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
            'value' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'variant_id' => 'required|exists:variants,id',
        ];
    }

    public function messages(): array
    {
        return [
            'value.required' => 'Tên biến thể là bắt buộc.',
            'value.string' => 'Tên biến thể phải là chuỗi ký tự.',
            'value.max' => 'Tên biến thể không được vượt quá 255 ký tự.',
            'price.required' => 'Giá trị biến thể là bắt buộc.',
            'price.numeric' => 'Giá trị phải là số.',
            'price.min' => 'Giá trị phải lớn hơn hoặc bằng 0.',
            'variant_id.required' => 'Biến thể cha là bắt buộc.',
            'variant_id.exists' => 'Biến thể cha không hợp lệ.',
        ];
    }
}
