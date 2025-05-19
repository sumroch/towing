<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;

class CarCategoryRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:64'
        ];
    }
}