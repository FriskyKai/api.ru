<?php

namespace App\Http\Requests;

class ProductRequest extends ApiRequest
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
            'name' => 'required|max:255',
            'price' => 'required|min:0.01|max:9999999999.99|decimal:2',
            'quantity' => 'required|integer|min:0',
            'photo' => 'max:255',
            'description' => 'required|max:255',
            'category_id' => 'required|min:1'
        ];
    }
}
