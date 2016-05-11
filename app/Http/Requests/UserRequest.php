<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
            'txtUser' => 'required|unique:users,username',
            'txtPass' => 'required',
            'txtRePass' => 'required|same:txtPass',
            'txtEmail' => 'required|email|unique:users,email'
        ];
    }
    public function messages()
    {
        return [
            'txtUser.required' => "Username empty",
            'txtUser.unique' => 'Username exist',
            'txtPass.required' => 'Password empty',
            'txtRePass.required' => 'Repassword empty',
            'txtRePass.same' => 'Repassword not correct',
            'txtEmail.required' => 'Email empty',
            'txtEmail.email' => 'Is not email adress',
            'txtEmail.unique' => 'Email address exist'
        ];
    }
}
