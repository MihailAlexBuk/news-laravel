<?php

namespace App\Http\Requests\Admin\Post;

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
            'search' => 'nullable|string|max:50',
        ];
    }

    public function messages()
    {
        return [
            'search.string' => 'Данные должны соответствовать строчному типу',
            'search.max' => 'Максимальный размер 50 символов',
        ];
    }
}
