<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => 'required | max:20',
            'price' => 'required | integer | max:9999999',
            'stock' => 'required | integer | max:99',
            'comment' => 'required | max:200',
            'sale' => 'required | integer | max:99',
        ];
    }
}
