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
            'comment' => ['required', 'max:1000', 'string']
        ];
    }

    protected function validationData()
    {
        $input = $this->all();
        $input['comment'] = !empty($input['comment']) ? mb_convert_kana($input['comment'], 's') : null;
        return $input;
    }
}

