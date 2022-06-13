<?php

namespace App\Http\Requests;

use App\Rules\DateNotBetween;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookingRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'settlement_date' => ['required','date',new DateNotBetween, 'before:release_date'],
            'release_date' => ['required','date',new DateNotBetween, 'after:settlement_date'],
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Нужно заполнить название',
            'address.required' => 'Нужно заполнить адрес',
        ];
    }
}
