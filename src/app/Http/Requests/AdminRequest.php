<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $uniqueEmail = 'unique:users';
        if (session('id')){
            $id = session('id');
            $uniqueEmail = 'unique:users,email,' .$id;
        }
        $id = session('id');
        return [
            'fullname' => 'required|min:5',
            'email' => 'required|email|'.$uniqueEmail,
            'group_id' => ['required', function($attribute, $value, $fail){
                if ($value==0){
                    $fail ('Bắt buộc phải chọn nhóm');
                }
            }],
        ];
    }

    public function messages(){
        return[
            'fullname.required' => 'Họ và tên bắt buộc phải nhập',
            'fullname.min' => 'Họ và tên phải từ :min ký tự trở lên',
            'email.required' => 'Email bắt buộc phải nhập',
            'email.email' => 'Email không hợp lệ',
            'email.unique'=>'Email đã được sử dụng',
            'group_id.required' => 'Bắt buộc phải chọn nhóm'
        ];
    }
}
