<?php

namespace App\Http\Requests\Product;

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
            'name' => 'required|string|min:5|max:255',
            'introduction' => 'required|string|min:5|max:255',
            'image' => 'image|mimes:png,jpg,webp',
            'price' => 'required|numeric',
            'brand_id ' => 'required|exists:brands,id',
            'category_id ' => 'required|exists:product_categories,id',
            'status' => 'required|numeric|in:0,1',
            'marketable' => 'required|numeric|in:0,1',
            'weight' => 'required|integer|min:1',
            'length' => 'required|integer|min:1',
            'width' => 'required|integer|min:1',
            'height' => 'required|integer|min:1',
        ];
    }
}
