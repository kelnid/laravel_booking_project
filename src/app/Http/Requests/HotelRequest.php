<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'address' => 'required|string|min:3',
            'description' => 'required|string|min:3',
            'image' => 'required|image'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Нужно заполнить название',
            'address.required' => 'Нужно заполнить адрес',
            'description.required' => 'Нужно заполнить описание',
            'image.required' => 'Нужно добавить картинку'
        ];
    }
}
