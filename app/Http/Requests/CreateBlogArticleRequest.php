<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBlogArticleRequest extends FormRequest
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
            'title'         => ['required', 'unique:blog_articles'],
            'image'         => ['required'],
            'desc'          => ['required'],
            'content'       => ['required'],
            'categories'    => ['required', 'array'],
            'categories.*'  => ['exists:blog_categories,id']
        ];
    }
}
