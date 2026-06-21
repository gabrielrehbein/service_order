<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'phone' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255'],
            'person_type' => ['required', 'in:PF,PJ'],
            'document' => ['required', 'string', 'max:14'],
            'state' => ['required', 'string', 'size:2'],
            'city' => ['required', 'string', 'max:150'],
            'street' => ['required', 'string', 'max:150'],
            'neighborhood' => ['required', 'string', 'max:150'],
            'number' => ['required', 'string', 'max:7'],
            'complement' => ['max:255'],
        ];
    }
}
