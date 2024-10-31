<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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

        $categoryId = $this->route('category'); // Lấy id của danh mục hiện tại nếu đang cập nhật

        // Kiểm tra uniqueness cho 'name' chỉ khi `parent_id` là `null`
        $rules['name'][] = Rule::unique('categories')
            ->where(function ($query) {
                return $query->whereNull('parent_id'); // Chỉ kiểm tra unique khi parent_id là null
            })
            ->ignore($categoryId); // Bỏ qua id hiện tại nếu là cập nhật

        return $rules;
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Bạn cần nhập tên danh mục',
            'name.unique' => 'Tên danh mục này đã tồn tại',
        ];
    }
}
