<?php

namespace App\Http\Requests\admins;

use App\Models\Variant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
{
    /**
     * Xác định xem người dùng có được phép thực hiện yêu cầu này không.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Lấy các quy tắc xác thực áp dụng cho yêu cầu.
     *
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|max:255|unique:products,name',
            'sku' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'slug' => 'nullable',
            'description_short' => 'nullable',
            'description' => 'nullable',
            'galleries' => 'array',
            'galleries.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'variants' => 'array|min:1', // Validate parent variants selection
            'variants.*' => 'exists:variants,id,parent_id,NULL', // Ensure selected variants are parents
            'categories' => 'array',
            'categories.*' => 'nullable',
        ];

        if ($this->input('product_type') == 'no_variant') {
            $rules['price_regular'] = ['nullable', 'numeric', 'min:0'];
            $rules['price_sale'] = [
                'required',
                'numeric',
                'min:0',
                function ($attribute, $value, $fail) {
                    $priceRegular = $this->input('price_regular');
                    if ($priceRegular > 0 && $value >= $priceRegular) {
                        $fail('Giá bán phải nhỏ hơn giá gốc khi giá gốc lớn hơn 0.');
                    }
                },
            ];
            $rules['quantity'] = 'required|integer|min:0';
        }

        if ($this->input('product_type') == 'has_variant') {
            // Get selected parent variants
            $selectedParentVariants = $this->input('variants', []);
            
            if (!empty($selectedParentVariants)) {
                // Validate child variants selection
                $rules['childVariant'] = 'array|min:1';
                $rules['childVariant.*'] = [
                    'required',
                    'exists:variants,id',
                    function ($attribute, $value, $fail) {
                        // Verify this is actually a child variant
                        $variant = Variant::find($value);
                        if (!$variant || !$variant->parent_id) {
                            $fail('Giá trị biến thể không hợp lệ.');
                        }
                    }
                ];

                // Validate variant values for selected child variants
                $childVariants = $this->input('childVariant', []);
                foreach ($childVariants as $childVariantId) {
                    $rules["variants_child.{$childVariantId}.price_regular"] = 'nullable|numeric|min:0';
                    $rules["variants_child.{$childVariantId}.price_sale"] = [
                        'required',
                        'numeric',
                        'min:0',
                        function ($attribute, $value, $fail) use ($childVariantId) {
                            $priceRegular = $this->input("variants_child.{$childVariantId}.price_regular");
                            if ($priceRegular > 0 && $value >= $priceRegular) {
                                $fail('Giá bán của biến thể phải nhỏ hơn giá gốc khi giá gốc lớn hơn 0.');
                            }
                        },
                    ];
                    $rules["variants_child.{$childVariantId}.quantity"] = 'required|integer|min:0';
                    $rules["variants_child.{$childVariantId}.img"] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
                }
            }
        }

        return $rules;
    }

    /**
     * Tùy chỉnh thông báo lỗi cho các quy tắc xác thực.
     *
     * @return array
     */
    public function messages()
    {
        $messages = [
            // Thông báo cho các trường chung và sản phẩm không có biến thể
            'name.required' => 'Tên sản phẩm là bắt buộc.',
            'name.max' => 'Tên sản phẩm vượt quá 255 ký tự. Vui lòng nhập lại.',
            'name.unique' => 'Tên sản phẩm đã tồn tại. Vui lòng chọn tên khác.',

            'img.image' => 'Tệp tải lên phải là một hình ảnh.',
            'img.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc gif.',
            'img.max' => 'Ảnh phải có kích thước tối đa là 2MB.',

            'galleries.*.image' => 'Tệp tải lên phải là một hình ảnh.',
            'galleries.*.mimes' => 'Ảnh phải có định dạng jpg, jpeg, png hoặc gif.',
            'galleries.*.max' => 'Ảnh phải có kích thước tối đa là 2MB.',

            // Thông báo cho sản phẩm không có biến thể
            'price_regular.numeric' => 'Giá gốc phải là một số.',
            'price_regular.min' => 'Giá gốc không được nhỏ hơn 0.',

            'price_sale.required' => 'Giá bán là bắt buộc.',
            'price_sale.numeric' => 'Giá bán phải là một số.',
            'price_sale.min' => 'Giá bán không được nhỏ hơn 0.',
            'price_sale.lt' => 'Giá bán phải nhỏ hơn giá gốc khi giá gốc lớn hơn 0.',

            'quantity.required' => 'Số lượng là bắt buộc.',
            'quantity.integer' => 'Số lượng phải là một số nguyên.',
            'quantity.min' => 'Số lượng không được nhỏ hơn 0.',
        ];

        // Thông báo lỗi cho các biến thể khi sản phẩm có biến thể
        if ($this->input('product_type') == 'has_variant') {
            $messages['variants.required'] = 'Bạn phải chọn ít nhất một biến thể.';
            $messages['variants.array'] = 'Dữ liệu biến thể không hợp lệ.';
            $messages['variants.min'] = 'Bạn phải chọn ít nhất một biến thể.';
            
            $selectedVariants = $this->input('variants', []);
            foreach ($selectedVariants as $variantId) {
                $messages["variants_child.{$variantId}.price_regular.numeric"] = 'Giá gốc của biến thể phải là một số.';
                $messages["variants_child.{$variantId}.price_regular.min"] = 'Giá gốc của biến thể không được nhỏ hơn 0.';
                $messages["variants_child.{$variantId}.price_sale.required"] = 'Giá bán của biến thể là bắt buộc.';
                $messages["variants_child.{$variantId}.price_sale.numeric"] = 'Giá bán của biến thể phải là một số.';
                $messages["variants_child.{$variantId}.price_sale.min"] = 'Giá bán của biến thể không được nhỏ hơn 0.';
                $messages["variants_child.{$variantId}.price_sale.lt"] = 'Giá bán của biến thể phải nhỏ hơn giá gốc khi giá gốc lớn hơn 0.';
                $messages["variants_child.{$variantId}.quantity.required"] = 'Số lượng của biến thể là bắt buộc.';
                $messages["variants_child.{$variantId}.quantity.integer"] = 'Số lượng của biến thể phải là một số nguyên.';
                $messages["variants_child.{$variantId}.quantity.min"] = 'Số lượng của biến thể không được nhỏ hơn 0.';
                $messages["variants_child.{$variantId}.img.image"] = 'Tệp tải lên của biến thể phải là một hình ảnh.';
                $messages["variants_child.{$variantId}.img.mimes"] = 'Ảnh của biến thể phải có định dạng jpg, jpeg, png hoặc gif.';
                $messages["variants_child.{$variantId}.img.max"] = 'Ảnh của biến thể phải có kích thước tối đa là 2MB.';
            }
        }

        return $messages;
    }
}
