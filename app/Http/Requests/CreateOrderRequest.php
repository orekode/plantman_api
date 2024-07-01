<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateOrderRequest extends FormRequest
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
            "name"      => ["required"],
            "quantity"  => ["required"],
            "number"    => ["required"],
            "cost"      => ["required"],
            "address"   => ["required"],
            "cart"      => ["required", "array"],
            "cart.*.id" => ["exists:products,id"]
        ];
    }
}
