<?php

namespace App\Http\Requests;

use App\Services\Generic\HandleNumericService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
        $this->merge([
            'cost_price' => HandleNumericService::convertBrazilianMoneyToFloat(
                $this->cost_price
            ),

            'sale_price' => HandleNumericService::convertBrazilianMoneyToFloat(
                $this->sale_price
            ),
        ]);
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
                    "min:3",
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
