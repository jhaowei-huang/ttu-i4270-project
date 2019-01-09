<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class SignInPost extends FormRequest
{
    protected $field;

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
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        // 判斷輸入的是帳號還是email
        $this->field = filter_var($this->get('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        return $this->all();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required'],
            'password' => ['required'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'username.required' => trans('validation.signIn.username.require'),
            'password.required' => trans('validation.signIn.password.require')
        ];
    }

    public function credentials()
    {
        return $this->field == 'email' ? [
            'email' => $this->get('username'),
            'password' => $this->get('password'),
        ] : [
            'username' => $this->get('username'),
            'password' => $this->get('password'),
        ];
    }
}
