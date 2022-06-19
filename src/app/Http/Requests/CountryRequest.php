<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:50',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Нужно заполнить название',
            'image.required' => 'Нужно добавить картинку',
            'image.image' => 'Неверный формат',
            'image.mimes:jpeg,jpg,png,gif' => 'Неверный формат'
        ];
    }
}
