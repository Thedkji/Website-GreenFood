<?php

namespace App\Http\Requests\admins;

use App\Models\Variant;
use Illuminate\Foundation\Http\FormRequest;

class UpdateVariantRequest extends FormRequest
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
        $id = $this->route("variant")->id; // ID của variant hiện tại
        $parentVariants = Variant::where("parent_id", $id)->get(); // Lấy các biến thể con của variant hiện tại

        $validate = [
            'name' => 'required',
            'parent_id' => 'nullable', // Trường hợp `parent_id` chính có thể bỏ trống
        ];

        // Lặp qua từng `parent` variant và thiết lập `required` cho `parent_id` tương ứng
        foreach ($parentVariants as $child) {
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
            'name.required' => 'Tên biến thể không được để trống',
        ];

        $id = $this->route("variant")->id;
        $parentVariants = Variant::where("parent_id", $id)->get();

        // Thêm thông báo lỗi cho từng `parent_id`
        foreach ($parentVariants as $child) {
            $messages["parent_id.{$child->id}.required"] = "Giá trị biến thể không được để trống";
        }

        return $messages;
    }
}
