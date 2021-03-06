<?php

return [
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
