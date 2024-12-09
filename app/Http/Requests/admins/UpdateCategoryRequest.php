<?php

namespace App\Http\Requests\admins;

use App\Models\Category;
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
        $id = $this->route("category")->id; // ID của category hiện tại
        $parentCategories = Category::where("parent_id", $id)->get(); // Lấy các danh mục con của Category hiện tại

        $validate = [
            'name' => 'required',
            'parent_id' => 'nullable', // Trường hợp `parent_id` chính có thể bỏ trống
        ];

        // Lặp qua từng `parent` Category và thiết lập `required` cho `parent_id` tương ứng
        foreach ($parentCategories as $child) {
            $validate["parent_id.{$child->id}"] = 'required';
        }

        return $validate;
    }

    /**
     * Custom error messages for validation
     *
     * @return array
     */
    public function messages(): array
    {
        $messages = [
            'name.required' => 'Tên danh mục không được để trống',
        ];

        $id = $this->route("category")->id;
        $parentCategories = Category::where("parent_id", $id)->get();

        // Thêm thông báo lỗi cho từng `parent_id`
        foreach ($parentCategories as $child) {
            $messages["parent_id.{$child->id}.required"] = "Danh mục con không được để trống";
        }

        return $messages;
    }
}
