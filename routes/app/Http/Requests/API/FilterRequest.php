<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'page' => 'nullable|integer',
            'gender' => 'nullable|integer',
            'categories' => 'nullable|array',
            'colors' => 'nullable|array',
            'sizes' => 'nullable|array',
            'existence' => 'nullable|array',
            'price' => 'nullable|array',
            'tags' => 'nullable|array',
        ];
    }
}
