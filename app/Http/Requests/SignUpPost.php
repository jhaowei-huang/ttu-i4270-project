<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SignUpPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() ? false : true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'g-recaptcha-response' => [new Captcha()],
            'username' => ['required', 'min:6', 'regex:/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6,20}$/', 'unique:users'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'different:username', 'regex:/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/'],
            'confirm_password' => 'required | same:password',
            'name' => ['required', "regex:/^[\x{4e00}-\x{9fa5}]{2,}$|[^!@#$%\^&*()_\-=+~`,.<>\]\[\{\}\|\'\"\/\\\\\;:]{3,}$/Au"],
            'address' => 'nullable | string',
            'department' => 'nullable | string',
            'position' => 'nullable | string',
            'phone' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'phone_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/'],
            'fax' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'fax_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/']
        ];
    }
}
