<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProductRequest extends FormRequest
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
        $id = is_object($this->product) ? $this->product->id : $this->product ?? null;
        return [
            'name' => 'required|min:3|max:255',
            'img' => 'mimes:jpg,bmp,png',
            'price' => 'numeric|min:0',
            'brand_id' => 'required',
            Rule::unique('products', 'name')->ignore($id),
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле является обязательным',
            'name.min' => 'Минимальная длина имени - 3 символа',
            'name.max' => 'Максимальная длина имени - 255 символов',
            'name.unique' => 'Такое имя уже существует',
            'img.mimes' => 'Неверный формат изображения',
            'price.min' => 'Число не может быть меньше нуля',
            'brand_id.required' => 'Поле является обязательным',
        ];
    }
}
