<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|string|max:64',
            'email'     => 'required|string|unique:users,email|max:50',
            'username'  => 'required|string|unique:users,username|max:64',
            'password'  => 'required|string|max:191',
            'telephone' => 'required|numeric',
            'store_id'  => 'nullable|integer|exists:stores,id'
        ];
    }
}
