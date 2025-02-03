<?php

namespace App\Domain\Order\Validators;

use Illuminate\Foundation\Http\FormRequest;

class NotificationSingleRequest extends FormRequest
{
    public function rules()
    {
        return [
            'token' => 'required',
            'title' => 'required',
            'body' => 'required',
            'category' => 'nullable',
            'screen' => 'nullable',
            'data' => 'nullable',
            'picture' => 'nullable',
        ];
    }
}
