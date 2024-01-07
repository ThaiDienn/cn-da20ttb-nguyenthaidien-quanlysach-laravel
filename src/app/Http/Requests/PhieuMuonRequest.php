<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhieuMuonRequest extends FormRequest
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
            'sdt' => 'required',
            'user_name' => 'required',
            'user_email' => 'required|email|',
            'product_name' => 'required'
        ];
    }

    public function messages(){
        return[
            'sdt.required' => 'Số điện thoại bắt buộc phải nhập',
            'user_name.required' => 'Họ và tên bắt buộc phải nhập',
            'user_email.required' => 'Email bắt buộc phải nhập',
            'user_email.email' => 'Email không hợp lệ',
            'product_name.required' => 'Tên sách bắt buộc phải nhập',
        ];
    }
}
