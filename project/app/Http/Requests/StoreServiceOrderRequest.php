<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreServiceOrderRequest extends FormRequest
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
            'service_value' => [
                'required',
                'numeric',
                'min:0',
            ],
            'discount' => [
                'nullable',
                'numeric',
                'min:0',
            ],
            'problem_description' => [
                'required',
                'string'
            ],
            'vehicle_id' => [
                'required',
                'exists:vehicles,id',
            ],
            'started_at' => [
                'nullable',
                'date',
            ],
            'products' => ['nullable', 'array'],
            'products.*' => ['exists:products,id'],
        ];
    }
}
