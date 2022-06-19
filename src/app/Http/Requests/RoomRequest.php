<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            'name' => 'required|string|min:3|max:100',
            'bed' => 'required|string|min:3|max:100',
            'area' => 'required|integer|min:3|max:100',
            'price' => 'required|integer|min:3|max:10000',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Нужно заполнить название',
            'bed.required' => 'Нужно заполнить вид кровати',
            'area.required' => 'Нужно заполнить площадь комнаты',
            'price.required' => 'Нужно заполнить стоимость комнаты',
            'area.integer' => 'Площадь может быть только числом!',
            'name.string' => 'Поле названия должно быть строкой!'
        ];
    }
}
