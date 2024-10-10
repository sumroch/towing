<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|max:64',
            'group_id'  => 'required|exists:groups,id',
        ];
    }
}