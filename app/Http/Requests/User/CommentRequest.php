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
            'comment' => 'required|max:250|regex:/^[ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９、。\n\r ]+$/u' 
        ];
    }

    public function messages()
    {
        return [
            'comment.required' => '入力必須の項目です。',
            'comment.max'      => '250文字以内で入力してください',
            'comment.regex'    => '全角スペースや、。以外の記号は入力できません',
        ];
    }
}

