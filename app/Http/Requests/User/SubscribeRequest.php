<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:subscribes|max:100',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Введен не корректный email адрес',
            'email.unique' => 'Введенный email адрес уже подписан',
            'email.max' => 'Длина email адреса не должна превышать 100 символов',
        ];
    }
}
