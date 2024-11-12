<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'username'  => 'required|string|unique:users,username|max:64',
            'password'  => 'required|string|max:191',
            'store_id'  => 'nullable|integer|exists:stores,id'
        ];
    }
}
