<?php

namespace App\Http\Requests;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "unit_price"=>'required|numeric',
            "name"=>'required|string',
            "description"=>'required|string',
            "status"=>'required|integer',
            "color"=>'required|string',
            "customizable"=>'required|integer',
            "is_active"=>'required|boolean',
            "user_id"=>'required|uuid|exists:users,id'
        ];
    }
    public function messages(): array
    {
        return [
            'unit_price.required' => 'A unit price is required',
            'name.required' => 'A name is required',
            'description.required' => 'A description is required',
            'status.required' => 'A status is required',
            'is_active.required' => 'A boolean is required',
            'user_id.required' => 'A user id is required',
        ];
    }
}
