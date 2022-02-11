<?php

namespace App\Http\Requests\orderinfos;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'array'],
            'phone' => ['required', 'number', 'min:5', 'max:100'],
            'email' => ['required', 'string', 'min:2', 'max:50'],
            'description' => ['sometimes', 'string'],
        ];
    }
}
