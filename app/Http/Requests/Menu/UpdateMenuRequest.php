<?php

namespace App\Http\Requests\Menu;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
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
            'name' => 'required|string|min:2,max:255',
            'url' => 'required|max:255|min:5',
            'status' => 'required|numeric|in:0,1',
            'parent_id' => 'nullable|min:1|max:100000000|regex:/^[0-9]+$/u|exists:menus,id',
        ];
    }
}
