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
            'content'         => 'required|max:250'
        ];
    }

    public function messages()
    {
        return [];
    }

    protected function validationData()
    {
        $input = $this->all();
        $input['title'] = mb_convert_kana($input['title'], 's');
        $input['content'] = mb_convert_kana($input['content'], 's');
        return $input;
    }
}

