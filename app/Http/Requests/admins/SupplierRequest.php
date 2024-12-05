<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            "name" => "required",
            "email" => "nullable",
            "phone" => "required|digits:10",
            "address" => "required"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Bạn cần nhập tên nhà cung cấp",
            "phone.required" => "Bạn cần nhập số điện thoại",
            "phone.digits" => "Số điện thoại phải là 10 số ",
            "address.required" => "Bạn phải nhập địa chỉ"
        ];
    }
}
