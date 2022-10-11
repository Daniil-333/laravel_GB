<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

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
        return [
            'name' => 'required|min:5|max:20',
            'email' => 'required|email|unique:users,email',
            'password' => "required|min:8|max:20",
            'password_repeat' => "required|min:8|max:20",
            'isAdmin' => 'sometimes|in:on',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ты забыл заполнить :attribute',
            'name.min' => 'Мало буков в поле :attribute',
            'email.required' => 'Ты забыл заполнить :attribute',
            'email.email' => 'Поле :attribute не валидно',
            'password.required' => 'Ты забыл заполнить :attribute',
            'password.min' => 'Мало символов в поле :attribute',
            'password.max' => 'Много символов в поле :attribute',
            'password_repeat.required' => 'Ты забыл заполнить :attribute',
            'password_repeat.min' => 'Мало символов в поле :attribute',
            'password_repeat.max' => 'Много символов в поле :attribute',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Имя пользователя',
            'email' => 'E-mail',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
        ];
    }
}
