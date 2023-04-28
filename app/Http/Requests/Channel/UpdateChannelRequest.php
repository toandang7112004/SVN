<?php

namespace App\Http\Requests\Channel;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChannelRequest extends FormRequest
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
            'title' => 'required',
            'meta_description' => 'required',
            'meta_keyword' => 'required',
            'image' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Vui lòng nhập',
            'meta_description.required' => 'Vui lòng nhập',
            'meta_keyword.required' => 'Vui lòng nhập',
            'image.required' => 'Vui lòng nhập',
        ];
    }
}
