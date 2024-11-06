<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
        $id = $this->route('category')->id;
        return [
            "name" => "required|unique:categories,name,$id",
            "parent_id" => "nullable",
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "Bạn cần nhập tên danh mục",
            "name.unique" => "Tên danh mục không được trùng",
        ];
    }
}
