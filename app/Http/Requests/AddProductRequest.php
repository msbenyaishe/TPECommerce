<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nom'       => 'required|min:5',
            'prix'      => 'required|numeric',
            'categorie' => 'required|min:3',
            'image'     => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'solde'     => 'nullable|boolean',
        ];
    }

    public function messages(): array
    {
        return [
            'nom.required'       => 'Product name is required',
            'nom.min'            => 'Name must be at least 5 characters',
            'prix.required'      => 'Price is required',
            'prix.numeric'       => 'Price must be a number',
            'categorie.required' => 'Category is required',
            'categorie.min'      => 'Category must be at least 3 characters',
            'image.required'     => 'Image file is required',
            'image.image'        => 'Image must be a valid image',
            'image.mimes'        => 'Image must be jpg, jpeg, png, or webp',
            'image.max'          => 'Image must not exceed 2MB',
        ];
    }
}
