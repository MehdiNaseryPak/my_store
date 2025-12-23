<?php

namespace App\Http\Requests\Brand;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBrandRequest extends FormRequest
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
            'persian_name' => 'required|string|min:2|max:255',
            'original_name' => 'required|string|min:2|max:255',
            'logo' => 'image|mimes:png,jpg,webp',
            'status' => 'required|numeric|in:0,1',  
        ];
    }
}
