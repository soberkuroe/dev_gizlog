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
            'tag_category_id' => ['required', 'integer', 'exists:tag_categories,id'],
            'title'           => ['required', 'max:30', 'string'],
            'content'         => ['required', 'max:1000', 'string']
        ];
    }

    protected function validationData()
    {
        $input = $this->all();
        $input['title'] = !empty($input['title']) ? mb_convert_kana($input['title'], 's') : null;
        $input['content'] = !empty($input['content']) ? mb_convert_kana($input['content'], 's') : null;
        return $input;
    }
}

