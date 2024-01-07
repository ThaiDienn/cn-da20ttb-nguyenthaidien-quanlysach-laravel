<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'=>'required|min:6',
            'tacgia'=>'required',
        ];
    }
    public function messages(){
        return [
            'name.required'=> 'Tên sản phẩm bắt buộc phải nhập',
            'name.min' => 'Tên sản phẩm không được nhỏ hơn :min ký tự',
            'tacgia.required' => 'Tên tác giả bắt buộc phải nhập',
        ];
    } 
}
