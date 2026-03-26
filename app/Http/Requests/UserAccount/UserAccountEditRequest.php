<?php

namespace App\Http\Requests\UserAccount;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserAccountEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Adjust if you want to restrict editing permissions
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        // get the user being edited from the route parameter
        $userId = $this->route('id'); 

        return [
            'username'   => [
                'required',
                'string',
                'max:255',
                Rule::unique('users', 'username')->ignore($userId),
            ],
            'email'      => [
                'required',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($userId),
            ],
            'first_name' => [
                'required',
                'string',
                'max:255',
            ],
            'last_name'  => [
                'required',
                'string',
                'max:255',
            ],
            'suffix'     => [
                'nullable',
                'string',
                'max:50',
            ],
        ];
    }
}