<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            //
            'category' => ['required', 'string','max:255'],
            'item' => ['required', 'string','max:255'],
            'price' => ['required', 'numeric', 'regex:/^\d+(\.\d{1,2})?$/'],
            'description' =>['required', 'string','max:255'],
            'stock' => ['required', 'int','max:255']
        ];
    }
}
