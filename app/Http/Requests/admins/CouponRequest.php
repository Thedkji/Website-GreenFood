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
            'discount_type' => 'required|in:0,1', 
            'coupon_amount' => ['required', 'numeric', function($attribute, $value, $fail) {
                if ($this->discount_type == 0) { 
                    if ($value < 1 || $value > 100) {
                        return $fail('Giảm giá phần trăm phải trong khoảng từ 1% đến 100%');
                    }
                } else { 
                    if ($value <= 0) {
                        return $fail('Giảm giá phải là một số dương');
                    }
                }
            }],
            'minimum_spend' => 'required|numeric',
            'maximum_spend' => 'required|numeric',
            'start_date' => 'required|date',
            'expiration_date' => 'required|date|after_or_equal:start_date',
            'status' => 'required|in:0,1,2,3', 
            'type' => 'required|in:0,1', 
            'quantity' => 'required|integer|min:1',
            
        ];
    }

    /**
     * Get the custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên mã giảm giá là bắt buộc.',
            'name.string' => 'Tên mã giảm giá phải là một chuỗi.',
            'name.max' => 'Tên mã giảm giá không được vượt quá 255 ký tự.',
            
            'discount_type.required' => 'Loại mã giảm giá là bắt buộc.',
            'discount_type.in' => 'Loại mã giảm giá không hợp lệ.',
            
            'coupon_amount.required' => 'Giá trị giảm giá là bắt buộc.',
            'coupon_amount.numeric' => 'Giá trị giảm giá phải là một số.',
            'coupon_amount.min' => 'Giá trị giảm giá phải lớn hơn hoặc bằng 1.',
            'coupon_amount.max' => 'Giá trị giảm giá không được vượt quá 100.',
            
            'minimum_spend.required' => 'Giá trị giỏ hàng tối thiểu là bắt buộc.',
            'minimum_spend.numeric' => 'Giá trị giỏ hàng tối thiểu phải là một số.',
            
            'maximum_spend.required' => 'Giá trị giỏ hàng tối đa là bắt buộc.',
            'maximum_spend.numeric' => 'Giá trị giỏ hàng tối đa phải là một số.',
            
            'start_date.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_date.date' => 'Ngày bắt đầu phải là một ngày hợp lệ.',
            
            'expiration_date.required' => 'Ngày hết hạn là bắt buộc.',
            'expiration_date.date' => 'Ngày hết hạn phải là một ngày hợp lệ.',
            'expiration_date.after_or_equal' => 'Ngày hết hạn phải sau hoặc bằng ngày bắt đầu.',
            
            'status.required' => 'Trạng thái là bắt buộc.',
            'status.in' => 'Trạng thái không hợp lệ.',
            
            'type.required' => 'Kiểu mã giảm giá là bắt buộc.',
            'type.in' => 'Kiểu mã giảm giá không hợp lệ.',
            
            'quantity.required' => 'Số lượng mã giảm giá là bắt buộc.',
            'quantity.integer' => 'Số lượng mã giảm giá phải là một số nguyên.',
            'quantity.min' => 'Số lượng mã giảm giá phải lớn hơn hoặc bằng 1.',
            
            
        ];
    }
}
