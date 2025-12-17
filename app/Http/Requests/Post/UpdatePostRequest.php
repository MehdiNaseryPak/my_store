<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
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
            'title' => 'required|string|min:5,max:255',
            'summary' => 'required|string',
            'body' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,webp',
            'category_id' => 'required|numeric|exists:post_categories,id',
            'status' => 'required|numeric|in:0,1',
            'commentable' => 'required|numeric|in:0,1',
            'published_at' => 'required'
        ];
    }
}
