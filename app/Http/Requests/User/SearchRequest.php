<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            '$category_id' => 'nullable|max:50|string',
            'search' => 'nullable|max:50|string',
        ];
    }

    public function messages()
    {
        return [
            'search.string' => 'Данные должны соответствовать строчному типу',
            'search.max' => 'Максимальное количество символов сообщения не должно превышать 50!',
        ];
    }
}
