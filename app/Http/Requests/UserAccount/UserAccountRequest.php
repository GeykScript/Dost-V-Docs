<?php

namespace App\Http\Requests\UserAccount;

use Illuminate\Foundation\Http\FormRequest;

class UserAccountRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
     public function rules(): array
    {
        return [
            'username'   => 'required|string|max:255|unique:users,username',
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'suffix'     => 'nullable|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'unit_id'    => 'required|exists:units,id',
            'position'   => 'required|string|max:255',
            'is_super_admin'   => 'required|in:0,1',
        ];
    }
}
