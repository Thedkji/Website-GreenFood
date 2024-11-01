<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'name' => 'required|max:255|unique:products,name',

            'sku' => 'nullable',

            'img' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'slug' => 'nullable',

            'price_regular' => 'nullable',

            'price_sale' => [
                'nullable',
                Rule::when($this->price_regular > 0, ['lt:price_regular']),
            ],

            'description_short' => 'nullable',
            'description' => 'nullable',


            'galleries' => 'array',
            'galleries.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',

            'variants' => 'array',
            'variants.*' => 'nullable',

            'categories' => 'array',
            'categories.*' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.max' => 'Tên sản phẩm vượt quá 255 ký tự vui lòng nhập lại',
            'name.unique' => 'Tên sản phẩm đã tồn tại vui lòng chọn tên khác',

            'img.image' => 'Tệp tải lên phải là một hình ảnh.',
            'img.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',

            'galleries.*.image' => 'Tệp tải lên phải là một hình ảnh.',
            'galleries.*.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',

            'price_sale.lt' => 'Giá giảm phải nhỏ hơn giá thông thường.',
        ];
    }
}
