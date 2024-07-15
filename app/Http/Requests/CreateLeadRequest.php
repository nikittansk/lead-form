<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateLeadRequest extends FormRequest
{
    function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255', 'min:3'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:leads,email',
            ],
            'phone' => ['required', 'string', 'size:10'],
            'city' => [
                'required',
                'string',
                'max:255',
                Rule::in(['Москва', 'Санкт-Петербург', 'Тула']),
            ],
        ];
    }
}