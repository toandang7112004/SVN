<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'group_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'username.required' => 'Không được để trống!',
            'password.required' => 'Không được để trống!',
            'confirm_password.required' => 'Vui lòng xác nhận mật khẩu!',
            'name.required' => 'Không được để trống!',
            'phone.required' => 'Không được để trống!',
            'group_id.required' => 'Không được để trống!',
        ];
    }
}
