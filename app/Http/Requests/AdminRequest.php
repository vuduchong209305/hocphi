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
        switch($this->method())
        {
            case `GET`:
            case `DELETE`:
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'email'    => 'email|unique:admins',
                    'password' => 'required|confirmed|min:6|max:30',
                    'phone'    => 'unique:admins',
                    'status'   => 'numeric'
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'email'    => 'unique:admins,email,'.$this->id,
                    'password' => 'nullable|confirmed|min:6|max:30',
                    'phone'    => 'unique:admins,phone,'.$this->id,
                    'status'   => 'numeric'
                ];
            }
            default:break;
        }
    }

    public function messages(): array
    {
        return [
            'email.unique'       => 'Email đã tồn tại',
            'email.email'        => 'Email phải đúng định dạng',
            'password.required'  => 'Mật khẩu bắt buộc',
            'password.confirmed' => 'Nhập lại mật khẩu không chính xác',
            'password.min'       => 'Mật khẩu phải từ 6 ký tự',
            'password.max'       => 'Mật khẩu không quá 30 ký tự',
            'phone.unique'       => 'Số điện thoại đã tồn tại',
            'status.numeric'     => 'Trạng thái phải là số'
        ];
    }
}
