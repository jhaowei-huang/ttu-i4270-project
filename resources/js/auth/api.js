function alert(text, type) {
    let alert = $('.alert:not(.alert-fixed)');
    let validation = $('.validation-area');
    let loading = $('.loading-icon');
    let close = $('.close');

    if (type == null) {
        alert.removeClass('alert-danger').addClass('alert-primary');
        loading.css('display', 'block');
        close.css('display', 'none');
    } else if (type === 'error') {
        alert.removeClass('alert-primary').addClass('alert-danger');
        loading.css('display', 'none');
        close.css('display', 'block');
    }

    if (text == null) {
        alert.css('display', 'none').removeClass('d-flex');
    } else {
        alert.css('display', 'block').addClass('d-flex');
    }

    validation.html(text);
}

window.auth = exports = module.exports = {
    tooltip: {
        'username': '帳號至少包含1個英文字以及1個數字，不可以有特殊符號，長度至少6個字元最多20字元',
        'email': '請輸入有效的email，格式包含 @',
        'password': '密碼至少包含1個英文字以及1個數字，可以有特殊符號，長度至少6個字元最多20字元，密碼與帳號不能相同',
        'confirm_password': '請再輸入一次相同的密碼',
        'name': '中文姓名不少於2個字，非中文姓名不少於3個字元，不能有特殊符號',
        'address': '選填，請輸入聯絡地址，例如：台北市中山區中山北路三段40號',
        'department': '選填，請輸入您的公司/部門，例如：大同大學資工系',
        'position': '選填，請輸入您的職稱，例如：專任助理',
        'phone': '選填，請輸入電話，格式：[區碼][號碼]，例如：0221822928',
        'phone_ext': '選填，請輸入電話分機號碼，最多10碼，例如：6565',
        'fax': '選填，請輸入傳真，格式：[區碼][號碼]，例如：0221822928',
        'fax_ext': '選填，請輸入傳真分機號碼，最多10碼，例如：6572'
    },

    waiting: function (status = true) {
        if (status) {
            $('.alert-fixed').alert('close');
            // 等待資料傳輸中
            alert('驗證中，請稍後');
            $('input').prop('disabled', true);
            $('#btn-submit').prop('disabled', true);
        } else {
            // 資料傳輸完畢
            alert();
            $('.input-invalid').removeClass('input-invalid');
            $('input').prop('disabled', false);
            $('#btn-submit').prop('disabled', false);

            // 如果該頁面有recaptcha則刷新
            if ($('.g-recaptcha').length)
                grecaptcha.reset();
        }
    },
    invalidInput: function (errors) {
        let errorMsg = '';
        for (let key in errors) {
            if (key === 'g-recaptcha-response')
                $('.g-recaptcha').addClass('input-invalid');

            if (errors[key] !== '' && errors.hasOwnProperty(key)) {
                errorMsg += errors[key] + '<br>';
                $('#' + key).addClass('input-invalid');
            }
        }

        alert(errorMsg, 'error');
    },
    success: function (response) {
        try {
            // response正確，跳轉至指定頁面
            window.location.href = response.redirect;
        } catch (e) {
            console.log(e);
            console.log(response);
            module.exports.waiting(false);
        }
    },
    error: function (jqXHR, exception) {
        module.exports.waiting(false);

        if (jqXHR.status === 422) {
            // 狀態422為Laravel預設的表單驗證錯誤狀態
            let errors = jqXHR.responseJSON.errors;
            module.exports.invalidInput(errors);
        } else {
            alert();
            $('.validation-area').append(jqXHR.status, '：伺服器錯誤');
        }
    },
    ajax: function (type = 'GET', url, data, successHandller = module.exports.success, errorHandller = module.exports.error) {
        $.ajax({
            type: type,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            data: data,
            success: successHandller,
            error: errorHandller
        })
    }
}
;
