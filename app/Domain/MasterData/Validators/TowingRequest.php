<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;

class TowingRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|max:64',
        ];
    }
}