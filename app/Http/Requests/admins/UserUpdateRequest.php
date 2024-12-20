<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        $id = $this->route('user');
        return [
            'name' => 'required|max:255',
            'avatar' => 'image|max:2048',
            'user_name' => "max:100|unique:users,user_name,$id",
            // 'email' => "required|email|max:255",
            'phone' => "required|max:10",
            'province' => 'required|max:100',
            'district' => 'required|max:100',
            'ward' => 'required|max:100',
            'address' => 'required|max:255',
            'role' => 'required', // Nếu `role` liên kết với bảng `roles`
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Tên người dùng là bắt buộc.',
            // 'avatar.required' => 'Ảnh đại diện là bắt buộc.',
            'avatar.image' => 'Tệp tải lên phải là một hình ảnh.',
            // 'avatar.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',
            'avatar.max' => 'Ảnh tải lên phải nhỏ hơn 2MB.',
            'user_name.required' => 'Tên đăng nhập là bắt buộc.',

            'user_name.unique' => 'Tên đăng nhập đã tồn tại.',
            // 'email.required' => 'Email là bắt buộc.',
            // 'email.email' => 'Email phải đúng định dạng.',
            // 'email.unique' => 'Email đã tồn tại.',
            // 'email_edit.required' => 'Email là bắt buộc.',

            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.max' => 'Số điện thoại nhập tối đa là 10 số.',
            // 'phone.unique' => 'Số điện thoại đã tồn tại.',
            'province.required' => 'Tỉnh/Thành phố là bắt buộc.',
            // 'district.required' => 'Quận/Huyện là bắt buộc.',
            // 'ward.required' => 'Phường/Xã là bắt buộc.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'role.required' => 'Vai trò của người dùng là bắt buộc.',
            // 'role.exists' => 'Vai trò không hợp lệ.',
        ];
    }
}
