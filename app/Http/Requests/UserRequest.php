<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class UserRequest extends FormRequest
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
            'name' => 'required|sometimes|min:3',
            'email' => "required|sometimes|email|unique:App\Models\User,email,$user_id",
            'password' => 'required|sometimes|string|min:5|confirmed',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bu Alan Zorunludur.',
            'name.min' => 'Adı ve Soyadı Alanı En Az 3 Karakterden Oluşmalıdır.',
            'email.required' => 'Bu Alan Zorunludur.',
            'email.email' => 'Girdiğiniz Değer Email Formatına Uygun Olmalıdır.',
            'email.unique' => 'Girdiğiniz Email Sistmede Kayıtlıdır.',
            'password.required' => 'Bu Alan Zorunludur.',
            'password.min' => 'Şifre Alanı En Az 5 Karakterden Oluşmalıdır.',
            'password.confirmed' => 'Girilen Şifreler Aynı Değildir.',
        ];
    }

    protected function passedValidation()
    {
        if ($this->has('password'))
        {
            $password = $this->request->get('password');
            $this->request->set("password", Hash::make($password));
        }
    }
}
