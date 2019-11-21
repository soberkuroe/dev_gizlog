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
            'search_word' => 'max:10|string',
        ];
    }

    public function messages()
    {
        return [];
    }
}