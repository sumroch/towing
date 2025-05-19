<?php

namespace App\Domain\Order\Validators;

use Illuminate\Foundation\Http\FormRequest;

class UpdateConfirmDriverOrderRequest extends FormRequest
{
    public function rules()
    {
        return [
            'car_name'      => 'required|string|max:64',
            'number_plate'  => 'nullable|string|max:15',
            'number_body'   => 'nullable|string|max:25',
            'car_color_id'  => 'required|integer|exists:car_colors,id',
            'car_category'  => 'required|integer|exists:car_categories,id',
            'car_condition' => 'nullable|string|max:15',
            'memo'          => 'nullable|string|max:191',
            'date'          => 'required|date',
            'pic_1'         => 'nullable|string|max:15',
            'pic_2'         => 'nullable|string|max:15',
            'store_origin'  => 'required|integer|exists:stores,id',
            'store_destination' => 'required|integer|exists:stores,id',
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'status' => 'done',
            'finished_at' => now(),
        ]);
    }
}