<!doctype html>
<html lang="zh-Hant-TW">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.email_subject.registration') }}</title>
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

        #code {
            width: 200px;
            height: 200px;
        }
    </style>
</head>

<body>
<h4>{{ config('app.email_subject.registration') }}</h4>
<p>{{ $user['name'] }} 您好</p>
<p>以下是您報名2018紡織科技國際論壇暨研發成果展的訊息</p>
<p>屆時將以QRcode當作入場憑證</p>
<br>
<p>帳號： {{ $user['username'] }}</p>
<p>email： {{ $user['email'] }}</p>
<br>
<p>入場憑證：</p>
{{--<img id="code" src={{ $user['code'] }} alt="QRcode.svg">--}}
<br>
<p>為保護您的帳號安全，請勿將該信件轉寄、轉發或是洩漏給其他人</p>
<p>若您最近沒有報名參加議程</p>
<p>請勿理會此信件</p>
<br>
<a href="{{ route('index') }}">2018紡織科技國際論壇暨研發成果展</a>
<p>大同大學軟體服務設計的創新實務第13組 敬啟</p>
</body>

</html>
