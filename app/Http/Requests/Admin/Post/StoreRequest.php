<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'required|file',
            'main_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_id' => 'required|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'no',
            'title.string' => 'oki',
            'content.required' => 'no',
            'content.string' => 'oki',
            'preview_image.required' => 'no',
            'preview_image.file' => 'no',
            'main_image.required' => 'no',
            'main_image.file' => 'no',
            'category_id.required' => 'no',
            'category_id.integer' => 'no',
            'category_id.exists' => 'no',
            'tag_id' => 'no',
        ];
    }
}
