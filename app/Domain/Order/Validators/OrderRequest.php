<?php

namespace App\Domain\Order\Validators;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'car_name'      => 'required|string|max:64',
            'number_plate'  => 'required|string|max:15',
            'car_color'     => 'required|string|max:15',
            'car_category'  => 'required|string|max:15',
            'car_condition' => 'nullable|string|max:15',
            'memo'          => 'required|string|max:191',
            'date'          => 'required|date',
            'time'          => 'nullable|string',
            'pic_1'         => 'required|string|max:15',
            'pic_2'         => 'required|string|max:15',
            'store_origin'  => 'required|integer|exists:stores,id',
            'store_destination' => 'required|integer|exists:stores,id',
            'status'        => 'nullable|string|max:15',
        ];
    }
}
