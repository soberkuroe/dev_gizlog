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
        return [];
    }
}

