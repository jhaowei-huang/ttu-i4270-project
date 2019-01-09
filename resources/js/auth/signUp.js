function setTooltip() {
    // 增加欄位的輸入提示
    $('.input-signUp').each(function () {
        let content = auth.tooltip[$(this).attr('id')];
        $(this).popover({
            placement: 'top',
            container: 'body',
            trigger: 'focus',
            content: content
        }).blur(function () {
            $(this).popover('hide');
        });
    });
}

$(document).ready(function () {
    setTooltip();

    $('.close').on('click', function () {
        auth.waiting(false);
    });

    $('#form-signup').on('submit', function (e) {
        // 停用預設的遞送表單，預設的會導致頁面刷新
        e.preventDefault();
        // disabled的欄位無法使用jquery serialize函式，故需要先儲存表單資訊
        let data = $('#form-signup').serialize();
        auth.waiting();
        // 使用ajax遞送表單，避免頁面刷新
        auth.ajax('POST', '/signUp', data);
    });
});
