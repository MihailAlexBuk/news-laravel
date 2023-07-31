<?php

namespace App\Http\Requests\Admin\Post;

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
            'title' => 'required|string',
            'desc' => 'required|string',
            'category_id' => 'required|integer',
            'tag_ids' => 'required|array',
            'preview_image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Данные должны соответствовать строчному типу',
            'desc.required' => 'Это поле необходимо для заполнения',
            'desc.string' => 'Данные должны соответствовать строчному типу',
            'post_image.required' => 'Это поле необходимо для заполнения',
            'post_image.file' => 'Необходимо выбрать файл',
            'category_id.required' => 'Это поле необходимо для заполнения',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'ID категории должен быть в базе данных',
            'tag_ids[].array' => 'Необходимо отправить массив данных',
            'tag_ids[].required' => 'Это поле необходимо для заполнения',
        ];
    }
}
