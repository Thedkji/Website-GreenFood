<?php

namespace App\Http\Requests\admins;

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
        $id = $this->route("variant")->id;


        return [
            'name' => 'unique:variants,name,' . $id,
            'parent_id' => 'nullable',
        ];
    }


    public function messages(): array
    {
        return [
            'name.unique' => 'Tên biến thể đã tồn tại',
        ];
    }
}
