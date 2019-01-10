$(document).ready(function () {
    $('.btn, .item').click(function (e) {
        let id = (e.target.id === '') ? e.target.parentElement.id : e.target.id;

        if (id === 'btn-signin') {
            window.location.href = '/signIn';
        } else if (id === 'btn-signup') {
            window.location.href = '/signUp';
        } else if (id === 'btn-forgetPassword') {
            window.location.href = '/forgetPassword';
        } else if (id === 'btn-profile') {
            window.location.href = '/profile';
        } else if (id === 'btn-register') {
            window.location.href = '/registration/onlineRegister';
        } else if (id === 'btn-inquire' || id === 'btn-cancel') {
            alert('尚未完成');
        }
    });
});
