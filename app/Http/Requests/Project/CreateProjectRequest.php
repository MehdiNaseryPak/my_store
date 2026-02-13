<?php

namespace App\Http\Requests\Project;

use Illuminate\Foundation\Http\FormRequest;

class CreateProjectRequest extends FormRequest
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
            'title_fa' => 'required|min:2|max:255',
            'title_en' => 'required|min:2|max:255',
            'image' => 'required|image|mimes:png,jpg,gif,webp',
            'introduction_fa' => 'required|min:2|max:255',
            'introduction_en' => 'required|min:2|max:255',
            'status' => 'required|numeric|in:0,1'
        ];
    }
}
