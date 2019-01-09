<!doctype html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.email_subject.verification') }}</title>
    <style>
        .link {
            font-size: 1.2rem;
            color: #1d68a7;
        }

        .link:before {
            content: '→ ';
        }

        .link:after {
            content: ' ←';
        }

        .link:hover {
            background: #1d68a7;
            color: #ffffff;
        }
    </style>
</head>

<body>
<h4>{{ config('app.email_subject.verification') }}</h4>
<p>{{ $user['name'] }} 您好</p>
<p>請確認您的帳號與email如下</p>
<p>帳號： {{ $user['username'] }}</p>
<p>email： {{ $user['email'] }}</p>
<br>
<p>若上述資料正確，請點擊下方連結進行驗證</p>
<br>
<p>提醒您此信件將在{{ config('app.email_expired_time') }}分鐘內失效</p>
<a class="link" href="{{ url('/userVerification/' . $user['user_id'] . '/' . $user['token']) }}">點我進行驗證</a>
<br>
<p>或是複製下方連結自行前往</p>
<p><strong>{{ url('/userVerification/' . $user['user_id'] . '/' . $user['token']) }}</strong></p>
<br>
<p>為保護您的帳號安全，請勿將該信件轉寄、轉發或是洩漏給其他人</p>
<p>若您最近沒有進行註冊或修改email的行為</p>
<p>請勿理會此信件</p>
<br>
<a href="{{ route('index') }}">2018紡織科技國際論壇暨研發成果展</a>
<p>大同大學軟體服務設計的創新實務第13組 敬啟</p>
</body>

</html>
