<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateBrandRequest extends FormRequest
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
        $id = is_object($this->brand) ? $this->brand->id : $this->brand ?? null;
        $creation_year = $this->input('creation_year');

        return [
//            'name' => 'required|min:3|max:25|unique:brands,name'.$id,
            'name' => [
                'required',
                'min:3',
                'max:25',
//                'unique:brands,name'.$id,
                Rule::unique('brands', 'name')->ignore($id),
            ],
            // если нет года создания - logo обязателен
//            'logo' => [
//                Rule::requiredIf(function () use ($creation_year) {
//                    return is_null($creation_year);
//                })
//            ],
        ];
    }

    public function messages()
    {
        return [
            'name.min' => 'Имя должно быть не менее 3 символов.',
            'name.email' => 'Некорректный е-майл.',
            'name.unique' => 'Такое имя уже занято',
        ];
    }
}
