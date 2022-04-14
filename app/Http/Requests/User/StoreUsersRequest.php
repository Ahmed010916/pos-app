<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreUsersRequest extends FormRequest
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
            'name'            => 'required|string|max:255|min:1',
            'email'           => 'required|unique:users,email|email|max:255|',
            'password'        => 'required|string|max:255|min:6|confirmed',
            'Permissions'     => 'required|array',
        ];
    }
}
