$(document).ready(function () {
    $('.close').on('click', function () {
        auth.waiting(false);
    });

    $('#form-profile').on('submit', function (e) {
        // 停用預設的遞送表單，預設的會導致頁面刷新
        e.preventDefault();
        // disabled的欄位無法使用jquery serialize函式，故需要先儲存表單資訊
        let data = $('#form-profile').serialize();
        auth.waiting();
        // 使用ajax遞送表單，避免頁面刷新
        auth.ajax('POST', '/profile', data);
    });

    $('#btn-editPassword').on('click', function (e) {
        window.location.href = '/profile/updatePassword';
    });

    $('#btn-editEmail').on('click', function (e) {
        window.location.href = '/profile/updateEmail';
    });
});
