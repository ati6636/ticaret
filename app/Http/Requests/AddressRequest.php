<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
        $user_id = $this->request->get('user_id');
        return [
            'user_id' => 'required|numeric',
            'city' => "required|min:3",
            'district' => 'required|min:3',
            'zipcode' => 'required|min:3',
            'addresses' => 'required|min:30',
        ];
    }
    public function messages()
    {
        return [
            'user_id.required' => 'Bu Alan Zorunludur.',
            'user_id.numeric' => 'Bu Alan Sayısal Olmak Zorundadır.',
            'city.required' => 'Bu Alan Zorunludur.',
            'city.min' => 'Bu Alan En Az 5 Karakterden Oluşmalıdır.',
            'district.required' => 'Bu Alan Zorunludur.',
            'district.min' => 'Bu Alan En Az 3 Karakterden Oluşmalıdır.',
            'zipcode.required' => 'Bu Alan Zorunludur.',
            'zipcode.min' => 'Bu Alan En Az 3 Karakterden Oluşmalıdır.',
            'addresses.required' => 'Bu Alan Zorunludur.',
            'addresses.min' => 'Bu Alan En Az 30 Karakterden Oluşmalıdır.',
        ];
    }
}
