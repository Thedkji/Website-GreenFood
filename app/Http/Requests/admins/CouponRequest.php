<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
        'coupon_amount' => 'required|numeric',
        'minimum_spend' => 'required|numeric',
        'maximum_spend' => 'required|numeric',
        'quantity' => 'required|integer|min:1', 
        'start_date' => 'required|date|before:expiration_date', 
        'expiration_date' => 'required|date|after:start_date', 
        'type' => 'required|in:0,1',
        'status' => 'required|integer',
        'description' => 'nullable|string',
        'coupon_category' => 'required|array', 
        'coupon_product' => 'required|array', 
        'coupon_user' => 'required|array', 
    ];
}

public function messages()
{
    return [
        'name.required' => 'Tên mã giảm giá là bắt buộc.',
        'coupon_amount.required' => 'Giá trị giảm giá là bắt buộc.',
        'minimum_spend.required' => 'Giá trị giảm thấp nhất là bắt buộc.',
        'maximum_spend.required' => 'Giá trị giảm cao nhất là bắt buộc.',
        'quantity.required' => 'Số lượng là bắt buộc.',
        'quantity.min' => 'Số lượng phải lớn hơn hoặc bằng 1.',
        'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
        'start_date.date' => 'Ngày bắt đầu phải là định dạng ngày hợp lệ.',
        'expiration_date.required' => 'Ngày hết hạn là bắt buộc.',
        'expiration_date.date' => 'Ngày hết hạn phải là định dạng ngày hợp lệ.',
        'expiration_date.after' => 'Ngày hết hạn phải sau ngày bắt đầu.',
        'type.required' => 'Kiểu mã giảm giá là bắt buộc.',
        'status.required' => 'Trạng thái là bắt buộc.',
        'coupon_category.required' => 'Danh mục mã giảm giá là bắt buộc.',
        'coupon_product.required' => 'Sản phẩm mã giảm giá là bắt buộc.',
        'coupon_user.required' => 'Người dùng mã giảm giá là bắt buộc.',
    ];
}

}
