<?php

namespace App\Http\Requests;

use App\Model\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdatePasswordPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check() ? true : false;
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        return [
            'username' => Auth::user()->username,
            'old_password' => $this->get('old_password'),
            'new_password' => $this->get('new_password'),
            'confirm_new_password' => $this->get('confirm_new_password'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old_password' => ['required'],
            'new_password' => ['required', 'different:username', 'regex:/^(?=.*\d)(?=.*[a-zA-Z]).{6,20}$/'],
            'confirm_new_password' => 'required | same:new_password',
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
            'old_password.required' => trans('validation.updatePassword.old_password.required'),
            'new_password.required' => trans('validation.updatePassword.new_password.required'),
            'new_password.different' => trans('validation.updatePassword.new_password.different'),
            'new_password.regex' => trans('validation.updatePassword.new_password.regex'),
            'confirm_new_password.required' => trans('validation.updatePassword.confirm_new_password.required'),
            'confirm_new_password.same' => trans('validation.updatePassword.confirm_new_password.same'),
        ];
    }
}
