<?php

namespace App\Rules;

use App\Models\Booking;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;

class DateNotBetween implements Rule, DataAwareRule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    protected $data = [];

    public function setData($data){
        $this->data = $data;
        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $firstPartOfTheRequest = Booking::where('room_id',$this->data['room_id'])
            ->whereBetween('settlement_date',[$this->data['settlement_date'],$this->data['release_date']])
            ->orWhereBetween('release_date',[$this->data['settlement_date'],$this->data['release_date']])
            ->where('room_id',$this->data['room_id'])
            ->count();

        $secondPartOfTheRequest = Booking::where('room_id',$this->data['room_id'])
            ->where('settlement_date','<=',$this->data['settlement_date'])
            ->where('release_date','>=',$this->data['settlement_date'])
            ->count();

        $firstPartOfTheRequest += $secondPartOfTheRequest;

        return $firstPartOfTheRequest === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'На эту дату уже забронирован номер';
    }
}
