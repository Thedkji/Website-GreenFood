<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'img' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // validate ảnh
            'price_regular' => 'required|numeric|min:0',
            'price_sale' => 'nullable|numeric|lt:price_regular|min:0', // giá sale phải nhỏ hơn giá regular
            'description' => 'nullable|string|max:1000',
            'slug' => 'required|string|max:255|unique:products,slug', // slug phải là duy nhất
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'img.image' => 'Tệp tải lên phải là một hình ảnh.',
            'img.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',
            'price_regular.required' => 'Giá thông thường là bắt buộc.',
            'price_sale.lt' => 'Giá giảm phải nhỏ hơn giá thông thường.',
            'slug.required' => 'Slug là bắt buộc.',
            'slug.unique' => 'Slug này đã tồn tại, vui lòng chọn slug khác.',
        ];
    }
}
