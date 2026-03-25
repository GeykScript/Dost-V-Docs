<?php

namespace App\Http\Requests\Documents;

use Illuminate\Foundation\Http\FormRequest;

class StoreDocumentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'document_name'     => ['required', 'string', 'max:255'],
            'type_id'           => ['required', 'integer', 'exists:document_types,id'],
            'category'          => ['required', 'in:Soft Copy,Hard Copy'],
            'priority_level_id' => ['required', 'integer', 'exists:priority_levels,id'],
            'file_upload'       => ['nullable', 'file'],
            'file_link'         => ['nullable', 'url'],
            'description'       => ['nullable', 'string'],
            'source_type'       => ['required', 'in:internal,external'],
            'sender_name'       => ['nullable', 'string', 'max:255'],
            'sender_email'      => ['nullable', 'email'],
            'assignment_id'     => ['required', 'integer', 'exists:user_assignments,id'],
            'route_unit_id'     => ['nullable', 'integer', 'exists:units,id'],
            'route_user_id'     => ['nullable', 'integer', 'exists:user_assignments,id'],
            'tagged_users'    => ['nullable', 'array'],
            'tagged_users.*'  => ['required', 'string'],  // string because "all" is not an int
            'tagged_units'    => ['nullable', 'array'],
            'tagged_units.*'  => ['required', 'string'],  // same here
        ];
    }
}