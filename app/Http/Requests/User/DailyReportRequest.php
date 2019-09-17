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
            'title'    => ['required', 'regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/'],
            'contents' => ['required', 'regex:/^[a-zA-Z0-9ａ-ｚA-Zぁ-んァ-ヶー一-龠]+$/'],
        ];
    }
  
    public function messages()
    {
        return [
            'title.required'    => '入力必須の項目です。',
            'contents.required' => '入力必須の項目です。',
            'title.regex'       => '記号などの入力は禁止です。',
            'contents.regex'    => '記号などの入力は禁止です。',
        ];
    }
}

