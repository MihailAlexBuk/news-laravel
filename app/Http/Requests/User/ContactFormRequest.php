<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required|string|max:50|min:3',
            'email' => 'required|email||max:100',
            'message' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо для заполнения',
            'name.string' => 'Данные должны соответствовать строчному типу',
            'name.max' => 'Длина имени не должна превышать 50 символов',
            'name.min' => 'Длина имени не должна быть меньше 3 символов',
            'email.required' => 'Это поле необходимо для заполнения',
            'email.email' => 'Введен не корректный email адрес',
            'email.max' => 'Длина email адреса не должна превышать 100 символов',
            'message.required' => 'Это поле необходимо для заполнения',
            'message.string' => 'Данные должны соответствовать строчному типу',
            'message.max' => 'Длина сообщения не должна превышать 255 символов',
        ];
    }
}
