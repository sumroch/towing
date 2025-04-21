<?php

namespace App\Domain\Order\Validators;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'car_name'      => 'required|string|max:64',
            'number_plate'  => 'nullable|string|max:15',
            'number_body'   => 'nullable|string|max:25',
            'car_color'     => 'required|string|max:15',
            'car_category'  => 'required|string|max:15',
            'car_condition' => 'nullable|string|max:15',
            'memo'          => 'nullable|string|max:191',
            'date'          => 'required|date',
            'pic_1'         => 'nullable|string|max:15',
            'pic_2'         => 'nullable|string|max:15',
            'store_origin'  => 'required|integer|exists:stores,id',
            'other'         => 'nullable|string|max:64',
            'store_destination' => 'required|integer|exists:stores,id',
            'status'        => 'nullable|string|max:15',
        ];
    }
}
