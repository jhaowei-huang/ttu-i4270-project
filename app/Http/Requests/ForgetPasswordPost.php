<?php

namespace App\Http\Requests;

use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ForgetPasswordPost extends FormRequest
{
    protected $redirect = '/';

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
            'email' => ['required', 'email', 'exists:users']
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
            'email.required' => trans('validation.forgetPassword.email.required'),
            'email.email' => trans('validation.forgetPassword.email.email'),
            'email.exists' => trans('validation.forgetPassword.email.exists'),
        ];
    }
}
