<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateEmailPost extends FormRequest
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
            'email.required' => trans('validation.updateEmail.email.required'),
            'email.email' => trans('validation.updateEmail.email.email'),
            'email.unique' => trans('validation.updateEmail.email.unique'),
        ];
    }
}
