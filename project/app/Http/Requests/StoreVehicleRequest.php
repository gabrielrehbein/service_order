<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
            'customer_id' => ['required', 'exists:customers,id'],
            'brand_id' => ['required', 'exists:brands,id'],

            'plate' => [
                'required',
                'string',
                'max:9',
                'unique:vehicles,plate',
            ],

            'model' => [
                'required',
                'string',
                'max:200',
            ],

            'km' => [
                'required',
                'integer',
                'min:0',
            ],

            'year_released' => [
                'required',
                'integer',
                'min:1900',
                'max:' . (date('Y') + 1),
            ],

            'type' => [
                'required',
                'string',
                'max:50',
            ],
        ];
    }
}
