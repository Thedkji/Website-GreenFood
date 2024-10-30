<?php

namespace App\Http\Requests\admins;

use App\Models\Variant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        $rules = [
            'name' => ['required'],
        ];

        // Kiểm tra tính duy nhất của name chỉ khi parent_id là null
        $rules['name'][] = Rule::unique('variants')
            ->where(function ($query) {
                return $query->whereNull('parent_id');
            })
            ->ignore($this->route('variant')); // Bỏ qua giá trị hiện tại nếu đang cập nhật

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Bạn cần nhập tên biến thể',
            'name.unique' => 'Tên biến thể đã tồn tại',
        ];
    }
}
