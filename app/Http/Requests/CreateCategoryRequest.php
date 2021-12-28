<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name' => 'string|min:8|max:20'
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Минимальная длина имени - 8 символов',
            'name.max' => 'Максимальная длина имени - 20 символов',
        ];
    }
}
