<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
public function rules(): array
{
    return [
        'username' => [
            'required',
            'string',
            'max:255',
            Rule::unique('users', 'username')->ignore($this->user()->id)
        ],

        'first_name' => [
            'required',
            'string',
            'max:255',
            'regex:/^[A-Za-z\s]+$/'
        ],

        'last_name' => [
            'required',
            'string',
            'max:255',
            'regex:/^[A-Za-z\s]+$/'
        ],

        'suffix' => [
        'nullable',
        'string',
        'max:10',
        'regex:/^[A-Za-z\.]+$/'
    ],

        'email' => [
            'required',
            'string',
            'lowercase',
            'email',
            'max:255',
            Rule::unique(User::class)->ignore($this->user()->id),
        ],
    ];
}
}
