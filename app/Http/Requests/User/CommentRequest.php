<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'comment' => 'required|string|max:1000',
            'post_id' => 'required|integer',
            'parent_id' => 'nullable|integer',
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => 'Это поле необходимо для заполнения',
            'comment.string' => 'Данные должны соответствовать строчному типу',
            'comment.max' => 'Максимальное количество символов комментария не должно превышать 1000!',
        ];
    }
}
