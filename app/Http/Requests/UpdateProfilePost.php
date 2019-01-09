<?php

namespace App\Http\Requests;

use App\Rules\Captcha;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProfilePost extends FormRequest
{
    protected $redirect = '/';

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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'g-recaptcha-response' => [new Captcha()],
            'name' => ['required', 'regex:/^[\x{4e00}-\x{9fa5}]{2,}$|[^!@#$%\^&*()_\-=+~`,.<>\]\[\{\}\|\'\"\/\\\\\;:]{3,}$/Au'],
            'address' => 'nullable | string | max:255',
            'department' => 'nullable | string | max:255',
            'position' => 'nullable | string | max:255',
            'phone' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'phone_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/'],
            'fax' => ['nullable', 'max:10', 'regex:/^[0]{1}[0-9]{1,3}[0-9]{5,8}$/'],
            'fax_ext' => ['nullable', 'max:10', 'regex:/^[0-9]{0,10}$/']
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
            'name.required' => trans('validation.signUp.name.required'),
            'name.regex' => trans('validation.signUp.name.regex'),
            'address.*' => trans('validation.signUp.address.error'),
            'department.*' => trans('validation.signUp.department.error'),
            'position.*' => trans('validation.signUp.position.error'),
            'phone.*' => trans('validation.signUp.phone.error'),
            'phone_ext.*' => trans('validation.signUp.phone_ext.error'),
            'fax.*' => trans('validation.signUp.fax.error'),
            'fax_ext.*' => trans('validation.signUp.fax_ext.error'),
        ];
    }
}
