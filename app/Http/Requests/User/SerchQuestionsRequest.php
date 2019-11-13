<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SerchQuestionsRequest extends FormRequest
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
            'search_word' => 'max:10|regex:/^[ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９、。\n\r ]+$/u',
        ];
    }

    public function messages()
    {
        return [
            'search_word.max'   => '10文字以内で入力してください',
            'search_word.regex' => '全角スペースや、。以外の記号は入力できません',
        ];
    }
}