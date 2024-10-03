<?php

namespace App\Domain\MasterData\Validator;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'      => 'required',
            'email'     => 'required|email',
            'username'  => 'required',
            'password'  => 'required',
            'telephone' => 'required',
        ];
    }
}
