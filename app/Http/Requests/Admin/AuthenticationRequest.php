<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AuthenticationRequest extends FormRequest
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
        $rules['txt_username']      = 'required';
        $rules['txt_password']      = 'required|min:6|max:15';

        return $rules;
    }

    /**
     * Get the validation message that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
             'txt_username.required'    => 'Username field is required.'
            ,'txt_password.required'    => 'Password field is required.'
            ,'txt_password.min'         => 'Password must be at least 6 characters.'
            ,'txt_password.max'         => 'Password must not be greater than 15 characters.'
        ];
    }
}
