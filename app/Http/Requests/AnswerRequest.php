<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnswerRequest extends FormRequest
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
            'answer' => 'required|integer|between:10,99'
        ];
    }

    public function messages()
    {
        return [
            'answer.required' => 'Заполните поле',
            'answer.integer' => 'Укажите двузначное число',
            'answer.between' => 'Значение должно быть двузначным'
        ];
    }
}
