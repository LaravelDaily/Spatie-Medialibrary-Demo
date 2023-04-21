<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required'],
            'post_text' => ['required'],
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
