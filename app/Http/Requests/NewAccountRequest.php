<?php

namespace Scholr\Http\Requests;

use Scholr\Http\Requests\Request;

class NewAccountRequest extends Request
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
            'loginId' => 'required|min:5|unique:users',
            'username'=> 'required|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ];
    }
}
