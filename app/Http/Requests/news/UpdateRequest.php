<?php

namespace App\Http\Requests\news;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules():array
    {
        return [
            'categories' => ['required', 'array'],
            'title' => ['required', 'string', 'min:5', 'max:100'],
            'author' => ['required', 'string', 'min:2', 'max:50'],
            'status' => ['required', 'string', 'min:4', 'max:8'],
            'isImage' => ['nullable', 'boolean'],
            'description' => ['sometimes', 'string'],
        ];
    }

    public function messages():array
    {
        return [
            'required' => 'Поле :attribute нужно заполнить!!!'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'наименование',
            'author' => 'автор'
        ];
    }
}
