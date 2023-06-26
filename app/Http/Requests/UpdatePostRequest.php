<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'max:100', Rule::unique('projects')->ignore($this->project)],
            'customer' => ['nullable'],
            'slug' => ['nullable'],
            'description' => ['nullable'],
            'cover_slug' => ['nullable'],
            'technologies' => ['exists:technologies,id']
        ];
    }
}
