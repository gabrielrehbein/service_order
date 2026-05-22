<?php

namespace App\Http\Requests;

use App\Services\Generic\HandleNumericService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        $data = [];

        if ($this->filled('cost_price')) {
            $data['cost_price'] = HandleNumericService::convertBrazilianMoneyToFloat(
                $this->cost_price
            );
        }

        if ($this->filled('sale_price')) {
            $data['sale_price'] = HandleNumericService::convertBrazilianMoneyToFloat(
                $this->sale_price
            );
        }

        $this->merge($data);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
        "name" => [
            "required",
            "string",
            "min:2",
            "max:150"
        ],

        "description" => [
            "nullable",
            "string",
            "max:1000"
        ],

        "cost_price" => [
            "required",
            "numeric",
            "min:0"
        ],

        "sale_price" => [
            "required",
            "numeric",
            "min:0",
            "gte:cost_price"
        ],

        "quantity" => [
            "required",
            "integer",
            "min:0"
        ],
    ];
}
}
