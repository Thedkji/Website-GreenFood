<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
        $productId = $this->route('product');

        return [
            'name' => 'required|string|max:255',
            'img' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
            'price_regular' => 'required|numeric|min:0',
            'price_sale' => 'required|numeric|lt:price_regular|min:0',
            'description' => 'required|string',
            'slug' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products', 'slug')->ignore($productId),
            ],
            'slides.*' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
            'variants' => 'sometimes|array',
            'variants.*' => 'exists:variants,id',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'img.image' => 'Tệp tải lên phải là một hình ảnh.',
            'img.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',
            'price_regular.required' => 'Giá thông thường là bắt buộc.',
            'description.required' => 'Mô tả là bắt buộc.',
            'price_sale.lt' => 'Giá giảm phải nhỏ hơn giá thông thường.',
            'slug.required' => 'Slug là bắt buộc.',
            'slug.unique' => 'Slug này đã tồn tại, vui lòng chọn slug khác.',
            'slides.required' => 'Ảnh slide là bắt buộc.',
            'variants.required' => 'Biến thể là bắt buộc.',
            'category_id.required' => 'Danh mục là bắt buộc.',
        ];
    }
}
