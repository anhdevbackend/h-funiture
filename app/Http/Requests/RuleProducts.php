<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Products;

class RuleProducts extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:products'],
            'price' => ['required', 'numeric', 'max:255'],
            'description' => ['required', 'string', 'max:500'],
            'image' => ['required', 'max:255'],
            'id_category' => ['required'],

        ];
    }
    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'max' => ':attribute Không được lớn hơn :max',
            'string' => ':attribute nhập kí tự không được nhập số',
            'numeric' => ':attribute phải nhập số',
            'max' => ':attribute nhập ít nhất :max kí tự',
            'unique' => ':attribute đã tồn tại'
        ];
    }
    public function attributes()
    {
        return [
            'name' => 'Tên sản phẩm',
            'price' =>'Giá',
            'description' => 'Mô tả',
            'image' => 'Hình',
            'id_category' => 'Loại sản phẩm'
        ];
    }
}
