function alert(text, type) {
    let alert = $('.alert');
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
    waiting: function (status = true) {
        if (status) {
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
        }
    },
    invalidInput: function (errors) {
        let errorMsg = '';
        for (let key in errors) {
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
    error:
        function (jqXHR, exception) {
            module.exports.waiting(false);

            if (jqXHR.status === 422) {
                // 狀態422為Laravel預設的表單驗證錯誤狀態
                let errors = jqXHR.responseJSON.errors;
                module.exports.invalidInput(errors);
            } else {
                alert();
                $('.validation-area').append(jqXHR.status, '：伺服器錯誤');
            }
        }

    ,
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
