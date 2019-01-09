<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ResendEmailPost extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email',
                Rule::unique('users', 'email')
                    ->ignore(Auth::user()->user_id, 'user_id')]
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
            'email.required' => trans('validation.resendEmail.email.required'),
            'email.email' => trans('validation.resendEmail.email.email'),
            'email.unique' => trans('validation.resendEmail.email.unique'),
        ];
    }
}
