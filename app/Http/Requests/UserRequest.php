<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\support\Facades\Validator;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 認証関係を入れる
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
            'name' => 'required | max:20',
            'postal_code' => 'required | max:7',
            'prefecture' => 'required | max:20',
            'city' => 'required | max:20',
            'block' => 'required | max:20',
            'building' => 'required | max:20',
            'phone' => 'required | max:11',
            'email' => 'required | max:254'
        ];
    }
}
