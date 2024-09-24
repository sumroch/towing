<?php

namespace App\Domain\Order\Validator;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'car_name',
            'number_plate',
            'car_color',
            'car_category',
            'car_condition',
            'memo',
            'date',
            'pic_1',
            'pic_2',
            'store_origin',
            'store_destination',
        ];
    }
}
