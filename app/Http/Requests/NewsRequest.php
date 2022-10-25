<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'title' => 'required|min:5|max:100',
            'description' => 'required|min:5',
            'category_id' => "required|exists:App\Models\Category,id",
            'image' => 'mimes:jpeg,bmp,png|max:1000',
//            'isPrivate' => 'boolean',
            'isPrivate' => 'sometimes|in:on',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Ты забыл заполнить :attribute',
            'title.min' => 'Мало символов в поле :attribute',
            'description.required' => 'Ты забыл заполнить :attribute',
            'description.min' => 'Мало символов в поле :attribute',
            'image.mimes' => 'Неверный формат изображения',
            'image.max' => 'Изображение должно быть не более 1Mb',
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'Заголовок новости',
            'description' => 'Описание новости',
            'category_id' => 'Категория новости',
            'image' => 'Изображение',
            'isPrivate' => '"Чекбокс Приватности"'
        ];
    }
}
