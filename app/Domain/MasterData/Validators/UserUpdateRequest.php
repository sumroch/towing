<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string|max:64',
            'email'     => [
                'nullable',
                'string',
                'max:50',
                Rule::unique('users', 'email')->ignore($this->route('user'))
            ],
            'username'  => [
                'nullable',
                'string',
                'max:64',
                Rule::unique('users', 'username')->ignore($this->route('user'))
            ],
            'password'  => 'nullable|string|min:5',
            'telephone' => 'required|numeric',
            'store_id'  => 'nullable|integer|exists:stores,id'
        ];
    }
}
