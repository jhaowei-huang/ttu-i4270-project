<?php

namespace App\Http\Requests;

use App\Model\PasswordReset;
use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ResetPasswordPost extends FormRequest
{
    protected $redirect = '/';
    protected $user;

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
        // 取得隱藏的token輸入
        $passwordReset = PasswordReset::where('token', $this->get('token'))->first();
        if (!isset($passwordReset)) {
            $this->user = null;
            // 若隱藏的token被竄改，找不到DB中重設密碼的紀錄
            return [
                'g-recaptcha-response' => '',
                'username' => '',
                'password' => '',
                'confirm_password' => '',
            ];
        } else {
            $this->user = $passwordReset->user;
            return [
                'g-recaptcha-response' => $this->get('g-recaptcha-response'),
                'username' => $passwordReset->user->username,
                'password' => $this->get('password'),
                'confirm_password' => $this->get('confirm_password'),
            ];
        }
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
            'password' => ['required', 'different:username', 'regex:/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/'],
            'confirm_password' => 'required | same:password',
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
            'password.required' => trans('validation.resetPassword.password.required'),
            'password.different' => trans('validation.resetPassword.password.different'),
            'password.regex' => trans('validation.resetPassword.password.regex'),
            'confirm_password.required' => trans('validation.resetPassword.confirm_password.required'),
            'confirm_password.same' => trans('validation.resetPassword.confirm_password.same'),
        ];
    }

    public function getUser()
    {
        return $this->user;
    }
}
