<?php

namespace App\Domain\Order\Validators;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'car_name'      => 'required|max:64',
            'number_plate'  => 'required|max:15',
            'car_color'     => 'required|max:15',
            'car_category'  => 'required|max:15',
            'car_condition' => 'required|max:15',
            'memo'          => 'required|max:191',
            'date'          => 'required',
            'time'          => 'nullable',
            'pic_1'         => 'required|max:15',
            'pic_2'         => 'required|max:15',
            'store_origin'  => 'required|exists:stores,id',
            'store_destination' => 'required|exists:stores,id',
        ];
    }
}
