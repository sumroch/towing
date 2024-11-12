<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username'  => [
                'nullable',
                'string',
                'max:64',
                Rule::unique('users', 'username')->ignore($this->route('user'))
            ],
            'password'  => 'nullable|string|min:5',
            'store_id'  => 'nullable|integer|exists:stores,id'
        ];
    }
}
