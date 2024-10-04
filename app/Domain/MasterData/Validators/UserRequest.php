<?php

namespace App\Domain\MasterData\Validators;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required|max:64',
            'email'     => 'required|unique:users,email|max:50',
            'username'  => 'required|unique:users,username|max:64',
            'password'  => 'required|max:191',
            'telephone' => 'required|max:15',
            'store_id'  => 'nullable|exists:stores,id'
        ];
    }
}
