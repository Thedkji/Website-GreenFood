<?php

namespace App\Http\Requests\admins;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'user_name' => "required|max:100|unique:users",

            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'email' => 'required|email|max:255|unique:users',

            'phone' => 'required|max:10|unique:users',

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
            'avatar.image' => 'Tệp tải lên phải là một hình ảnh.',
            'avatar.mimes' => 'Ảnh phải có định dạng jpg, jpeg, hoặc png.',
            'avatar.max' => 'Ảnh tải lên phải nhỏ hơn 2MB.',
            'user_name.required' => 'Tên đăng nhập là bắt buộc.',
            'user_name_edit.required' => 'Tên đăng nhập là bắt buộc.',
            'user_name.unique' => 'Tên đăng nhập đã tồn tại.',
            'password.required' => 'Mật khẩu là bắt buộc.',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            // 'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
            'password_confirmation.required' => 'Mật khẩu là bắt buộc.',
            // 'password_confirmation.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
            'password_confirmation.same' => 'Xác nhận mật khẩu không khớp.',
            'email.required' => 'Email là bắt buộc.',
            'email.email' => 'Email phải đúng định dạng.',
            'email.unique' => 'Email đã tồn tại.',
            'email_edit.required' => 'Email là bắt buộc.',
            'phone_edit.required' => 'Số điện thoại là bắt buộc.',
            'phone.required' => 'Số điện thoại là bắt buộc.',
            'phone.max' => 'Số điện thoại nhập tối đa là 10 số.',
            'phone.unique' => 'Số điện thoại đã tồn tại.',
            'province.required' => 'Tỉnh/Thành phố là bắt buộc.',
            'district.required' => 'Quận/Huyện là bắt buộc.',
            'ward.required' => 'Phường/Xã là bắt buộc.',
            'address.required' => 'Địa chỉ là bắt buộc.',
            'role.required' => 'Vai trò của người dùng là bắt buộc.',
            // 'role.exists' => 'Vai trò không hợp lệ.',
        ];
    }
}
