<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
        $user_id = $this->request->get('user_id');
        return [
            'category_id' => 'required|numeric',
            'name' => "required",
            'price' => 'required|numeric',
            'old_price' => 'required|numeric|sometimes',
            'lead' => 'required|min:5',
        ];
    }
    public function messages()
    {
        return [
            'category_id.required' => 'Bu Alan Zorunludur.',
            'category_id.numeric' => 'Bu Alan Sayısal Olmak Zorundadır.',
            'name.required' => 'Bu Alan Zorunludur.',
            'price.required' => 'Bu Alan Zorunludur.',
            'price.numeric' => 'Bu Alan Sayısal Olmak Zorundadır.',
            'old_price.required' => 'Bu Alan Zorunludur.',
            'old_price.numeric' => 'Bu Alan Sayısal Olmak Zorundadır.',
            'lead.required' => 'Bu Alan Zorunludur.',
            'lead.min' => 'Bu Alan En Az 5 Karakterden Oluşmalıdır.',
        ];
    }
    protected function passedValidation()
    {
        if (!$this->request->has("slug")) {
            $name = $this->request->get("name");
            $slug = Str::of($name)->slug();
            $this->request->set("slug", $slug);
        }
    }

}
