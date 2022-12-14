<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'title' => '',
            'description' => '',
            'title_image' => '',
            'gallery' => '',
            'category_id' => '',
            'gender' => '',
            'status' => '',
            'price' => '',
            'old_price' => '',
            'quantity' => '',
            'hit' => '',
            'colors' => '',
            'sizes' => '',
            'sale' => '',
            'tags' => '',

        ];
    }
}
