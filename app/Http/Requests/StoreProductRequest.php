<?php

namespace App\Http\Requests;

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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'unit_price'=>'request|numeric|min:1',
            'name'=>'request|string|max:50',
            'description'=>'request|text|max:255',
            'status'=>'request|integer',
            'color'=>'request|string|min:1',
            'customizable'=>'request|integer',
            'is_active'=>'request|boolean',
            'user_id'=>'request|exists:user.id',
        ];
    }
}
