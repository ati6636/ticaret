<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductImageRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'product_id' => 'required|numeric',
            'image_url' => "required|image|mimes:jpg,jpeg,png|sometimes",
        ];
    }
    public function messages(): array
    {
        return [
            'product_id.required' => 'Bu Alan Zorunludur.',
            'product_id.numeric' => 'Bu Alan Sayısal Olmak Zorundadır.',
            'image_url.required' => 'Bu Alan Zorunludur.',
            'image_url.mimes' => 'Bu Alan Sadece .jpg, .jpeg, .png Uzantılı Dosyalar Yüklenebilir.',
        ];
    }
}
