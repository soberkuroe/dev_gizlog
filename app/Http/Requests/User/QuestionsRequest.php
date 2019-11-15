<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsRequest extends FormRequest
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
            'tag_category_id' => 'required|integer|between:1,4',
            'title'           => 'required|max:30',
            'content'         => 'required|max:250|regex:/^[ぁ-んァ-ヶーa-zA-Z0-9一-龠０-９、。\n\r ]+$/u'
        ];
    }

    public function messages()
    {
        return [
            'tag_category_id.required' => 'カテゴリは必ず選択してください',
            'tag_category_id.integer'  => 'tag_category_idは変更できません',
            'tag_category_id.between'  => 'tag_category_idは変更できません',
            'title.required'           => '入力必須の項目です',
            'title.max'                => '30文字以内で入力してください',
            'content.required'         => '入力必須の項目です',
            'content.max'              => '250文字以内で入力してください',
            'content.regex'            => '全角スペースや、。以外の記号は入力できません',
        ];
    }

    protected function validationData()
    {
        $input = $this->all();
        $input['title'] = mb_convert_kana($input['title'], 's');
        return $input;
    }
}

