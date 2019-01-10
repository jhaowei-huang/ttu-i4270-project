<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute must be accepted.',
    'active_url' => 'The :attribute is not a valid URL.',
    'after' => 'The :attribute must be a date after :date.',
    'after_or_equal' => 'The :attribute must be a date after or equal to :date.',
    'alpha' => 'The :attribute may only contain letters.',
    'alpha_dash' => 'The :attribute may only contain letters, numbers, dashes and underscores.',
    'alpha_num' => 'The :attribute may only contain letters and numbers.',
    'array' => 'The :attribute must be an array.',
    'before' => 'The :attribute must be a date before :date.',
    'before_or_equal' => 'The :attribute must be a date before or equal to :date.',
    'between' => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'string' => 'The :attribute must be between :min and :max characters.',
        'array' => 'The :attribute must have between :min and :max items.',
    ],
    'boolean' => 'The :attribute field must be true or false.',
    'confirmed' => 'The :attribute confirmation does not match.',
    'date' => 'The :attribute is not a valid date.',
    'date_equals' => 'The :attribute must be a date equal to :date.',
    'date_format' => 'The :attribute does not match the format :format.',
    'different' => 'The :attribute and :other must be different.',
    'digits' => 'The :attribute must be :digits digits.',
    'digits_between' => 'The :attribute must be between :min and :max digits.',
    'dimensions' => 'The :attribute has invalid image dimensions.',
    'distinct' => 'The :attribute field has a duplicate value.',
    'email' => 'The :attribute must be a valid email address.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'The :attribute must be a file.',
    'filled' => 'The :attribute field must have a value.',
    'gt' => [
        'numeric' => 'The :attribute must be greater than :value.',
        'file' => 'The :attribute must be greater than :value kilobytes.',
        'string' => 'The :attribute must be greater than :value characters.',
        'array' => 'The :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'The :attribute must be greater than or equal :value.',
        'file' => 'The :attribute must be greater than or equal :value kilobytes.',
        'string' => 'The :attribute must be greater than or equal :value characters.',
        'array' => 'The :attribute must have :value items or more.',
    ],
    'image' => 'The :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'The :attribute field does not exist in :other.',
    'integer' => 'The :attribute must be an integer.',
    'ip' => 'The :attribute must be a valid IP address.',
    'ipv4' => 'The :attribute must be a valid IPv4 address.',
    'ipv6' => 'The :attribute must be a valid IPv6 address.',
    'json' => 'The :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'The :attribute must be less than :value.',
        'file' => 'The :attribute must be less than :value kilobytes.',
        'string' => 'The :attribute must be less than :value characters.',
        'array' => 'The :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'The :attribute must be less than or equal :value.',
        'file' => 'The :attribute must be less than or equal :value kilobytes.',
        'string' => 'The :attribute must be less than or equal :value characters.',
        'array' => 'The :attribute must not have more than :value items.',
    ],
    'max' => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file' => 'The :attribute may not be greater than :max kilobytes.',
        'string' => 'The :attribute may not be greater than :max characters.',
        'array' => 'The :attribute may not have more than :max items.',
    ],
    'mimes' => 'The :attribute must be a file of type: :values.',
    'mimetypes' => 'The :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'The :attribute must be at least :min.',
        'file' => 'The :attribute must be at least :min kilobytes.',
        'string' => 'The :attribute must be at least :min characters.',
        'array' => 'The :attribute must have at least :min items.',
    ],
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'The :attribute format is invalid.',
    'numeric' => 'The :attribute must be a number.',
    'present' => 'The :attribute field must be present.',
    'regex' => 'The :attribute format is invalid.',
    'required' => 'The :attribute field is required.',
    'required_if' => 'The :attribute field is required when :other is :value.',
    'required_unless' => 'The :attribute field is required unless :other is in :values.',
    'required_with' => 'The :attribute field is required when :values is present.',
    'required_with_all' => 'The :attribute field is required when :values are present.',
    'required_without' => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same' => 'The :attribute and :other must match.',
    'size' => [
        'numeric' => 'The :attribute must be :size.',
        'file' => 'The :attribute must be :size kilobytes.',
        'string' => 'The :attribute must be :size characters.',
        'array' => 'The :attribute must contain :size items.',
    ],
    'starts_with' => 'The :attribute must start with one of the following: :values',
    'string' => 'The :attribute must be a string.',
    'timezone' => 'The :attribute must be a valid zone.',
    'unique' => 'The :attribute has already been taken.',
    'uploaded' => 'The :attribute failed to upload.',
    'url' => 'The :attribute format is invalid.',
    'uuid' => 'The :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

    'g-recaptcha' => '請完成驗證碼',
    'token' => '傳輸內容被修改，請重新嘗試',
    'forget_password' => [
        'email' => [

        ],
        'password' => [

        ],
    ],
    'signIn' => [
        'username' => [
            'required' => '請輸入帳號或email',
            'error' => '帳號或email錯誤'
        ],
        'password' => [
            'required' => '請輸入密碼',
            'error' => '密碼錯誤'
        ],
    ],
    'signUp' => [
        'username' => [
            'required' => '請輸入帳號',
            'regex' => '帳號至少包含1個英文字以及1個數字，只能是英數字，長度6~20個字元',
            'unique' => '該帳號已經被其他人使用',
        ],
        'email' => [
            'required' => '請輸入email',
            'email' => 'email格式錯誤',
            'unique' => '該email已經被其他人使用'
        ],
        'password' => [
            'required' => '請輸入密碼',
            'different' => '密碼與帳號不能一樣',
            'regex' => '密碼至少包含1個英文字以及1個數字，可以有特殊符號，長度6~20個字元'
        ],
        'confirm_password' => [
            'required' => '請再輸入一次密碼',
            'same' => '兩次密碼不一樣',
        ],
        'name' => [
            'required' => '請輸入姓名',
            'regex' => '中文姓名不少於2個字，非中文不少於3個字元，不能有特殊符號'
        ],
        'address' => [
            'error' => '地址只能為字串格式，長度不超過255字符'
        ],
        'department' => [
            'error' => '公司/部門只能為字串格式，長度不超過255字符'
        ],
        'position' => [
            'error' => '職稱只能為字串格式，長度不超過255字符'
        ],
        'phone' => [
            'error' => '電話格式錯誤，請輸入[區碼][號碼]共10碼'
        ],
        'phone_ext' => [
            'error' => '電話分機格式錯誤，請輸入數字最多10碼'
        ],
        'fax' => [
            'error' => '傳真格式錯誤，請輸入[區碼][號碼]共10碼'
        ],
        'fax_ext' => [
            'error' => '傳真分機格式錯誤，請輸入數字最多10碼'
        ],
    ],
    'resendEmail' => [
        'email' => [
            'required' => '請輸入email',
            'email' => 'email格式錯誤',
            'unique' => '該email已經被其他人使用'
        ],
    ],
    'forgetPassword' => [
        'email' => [
            'required' => '請輸入email',
            'email' => 'email格式錯誤',
            'exists' => '找不到使用該email的帳號'
        ],
    ],
    'resetPassword' => [
        'password' => [
            'required' => '請輸入密碼',
            'different' => '密碼與帳號不能一樣',
            'regex' => '密碼至少包含1個英文字以及1個數字，可以有特殊符號，長度6~20個字元'
        ],
        'confirm_password' => [
            'required' => '請再輸入一次密碼',
            'same' => '兩次密碼不一樣',
        ],
    ],
    'updatePassword' => [
        'old_password' => [
            'required' => '請輸入原密碼',
            'error' => '原密碼錯誤',
        ],
        'new_password' => [
            'required' => '請輸入新密碼',
            'different' => '新密碼與帳號不能一樣',
            'regex' => '新密碼至少包含1個英文字以及1個數字，可以有特殊符號，長度6~20個字元'
        ],
        'confirm_new_password' => [
            'required' => '請再輸入一次密碼',
            'same' => '兩次密碼不一樣',
        ],
    ],
    'updateEmail' => [
        'email' => [
            'required' => '請輸入新的email',
            'email' => '新的email格式錯誤',
            'unique' => '該email已經被其他人使用',
            'same' => '與原本的email一樣'
        ],
    ],

];
