<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $customer_id = $this->customer->id ?? null; // L'indentifiant du customer
        return [
            "name" => "required|string|max:100",
            "email" => "required|unique:customer".(isset($customer_id) ? ",email,".$customer_id : ""),
            "adresse" => "required|string|max:255",
        ];
    }
}
