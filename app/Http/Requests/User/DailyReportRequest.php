<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class DailyReportRequest extends FormRequest
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
            'title'    => ['required', 'regex:/^([0-2]|0[0-2])$/'],
            'contents' => ['required', 'regex:/^([0-2]|0[0-2])$/'],
        ];
    }
  
    public function messages()
    {
        return [
            'title.required'    => '入力必須の項目です。',
            'contents.required' => '入力必須の項目です。',
            'title.regex'       => '半角英数字で入力して下さい。',
            'contents.regex'    => '半角英数字で入力して下さい。',
        ];
    }
}

