<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreChangePasswordRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'oldpassword' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
        ];
    }
    public function messages(){
        return [
            'oldpassword.required' => 'vui lòng nhập mật khẩu cũ',
            'password.required' => 'vui lòng nhập mật khẩu mới',
            'confirm_password.required' => 'vui lòng xác nhận mật khẩu',
        ];
    }
}
