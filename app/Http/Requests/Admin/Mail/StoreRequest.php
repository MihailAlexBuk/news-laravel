<?php

namespace App\Http\Requests\Admin\Mail;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'answer' => 'required|string|max:1500',
        ];
    }

    public function messages()
    {
        return [
            'answer.required' => 'Обязательно к заполнению!',
            'answer.string' => 'Данные должны соответствовать строчному типу',
            'answer.max' => 'Максимальный размер 1500 символов',
        ];
    }
}
