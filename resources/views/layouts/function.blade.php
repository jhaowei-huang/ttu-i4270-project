@php
    $enable = ((isset($all) ? $all : true) == true) ? [true, true, true, true, true, true, true] :
    [false, false, false, false, false, false, false];

    $enable[0] = isset($register) ? $register : $enable[0];
    $enable[1] = isset($inquire) ? $inquire : $enable[1];
    $enable[2] = isset($cancel) ? $cancel : $enable[2];
    $enable[3] = isset($signin) ? $signin : $enable[3];
    $enable[4] = isset($signup) ? $signup : $enable[4];
    $enable[5] = isset($forget) ? $forget : $enable[5];
    $enable[6] = isset($profile) ? $profile : false;

    $justify = isset($align) ? $align : 'justify-content-between';

    $path = isset($style) ? $style : 'css/function.css';
@endphp

<link href="{{ asset($path) }}" rel="stylesheet">

@if($path == 'css/function.css')
    <div class="row {{ $justify }} mt-2 mx-1">
        @if($enable[0])
            <div id="btn-register"
                 class="btn d-flex flex-fill justify-content-center align-content-between function1">
                <i class="fas fa-calendar-plus"></i><span>線上報名</span>
            </div>
        @endif
        @if($enable[1])
            <div id="btn-inquire"
                 class="btn d-flex flex-fill justify-content-center align-content-between function2">
                <i class="fas fa-search"></i><span>查詢報名</span>
            </div>
        @endif
        @if($enable[2])
            <div id="btn-cancel"
                 class="btn d-flex flex-fill justify-content-center align-content-between function3">
                <i class="fas fa-calendar-minus"></i><span>取消報名</span>
            </div>
        @endif
        @if($enable[3])
            <div id="btn-signin"
                 class="btn d-flex flex-fill justify-content-center align-content-between function4">
                <i class="fas fa-arrow-right"></i><span>登入會員</span>
            </div>
        @endif
        @if($enable[4])
            <div id="btn-signup"
                 class="btn d-flex flex-fill justify-content-center align-content-between function5">
                <i class="fas fa-user"></i><span>註冊會員</span>
            </div>
        @endif
        @if($enable[5])
            <div id="btn-forgetPassword"
                 class="btn d-flex flex-fill justify-content-center align-content-between function6">
                <i class="fas fa-question"></i></i><span>忘記密碼</span>
            </div>
        @endif
        @if($enable[6])
            <div id="btn-profile"
                 class="btn d-flex flex-fill justify-content-center align-content-between function7">
                <i class="fas fa-user"></i></i><span>個人資訊</span>
            </div>
        @endif
    </div>
@endif

@if($path == 'css/function-dropdown.css')
    <div class="dropdown-functions">
        @if($enable[3])
            <div class="dropdown-item">
                <div id="btn-signin"
                     class="item d-flex flex-fill justify-content-center align-content-between function4">
                    <i class="fas fa-arrow-right"></i><span>登入會員</span>
                </div>
            </div>
        @endif
        @if($enable[4])
            <div class="dropdown-item">
                <div id="btn-signup"
                     class="item d-flex flex-fill justify-content-center align-content-between function5">
                    <i class="fas fa-user"></i><span>註冊會員</span>
                </div>
            </div>
        @endif
        @if($enable[5])
            <div class="dropdown-item">
                <div id="btn-forgetPassword"
                     class="item d-flex justify-content-center align-content-between function6">
                    <i class="fas fa-question"></i></i><span>忘記密碼</span>
                </div>
            </div>
        @endif
        @if($enable[6])
            <div class="dropdown-item">
                <div id="btn-profile"
                     class="item d-flex justify-content-center align-content-between function7">
                    <i class="fas fa-user"></i></i><span>個人資訊</span>
                </div>
            </div>
        @endif
        @if($enable[0])
            <div class="dropdown-item">
                <div id="btn-register"
                     class="item d-flex flex-fill justify-content-center align-content-between function1">
                    <i class="fas fa-calendar-plus"></i><span>線上報名</span>
                </div>
            </div>
        @endif
        @if($enable[1])
            <div class="dropdown-item">
                <div id="btn-inquire"
                     class="item d-flex flex-fill justify-content-center align-content-between function2">
                    <i class="fas fa-search"></i><span>查詢報名</span>
                </div>
            </div>
        @endif
        @if($enable[2])
            <div class="dropdown-item">
                <div id="btn-cancel"
                     class="item d-flex flex-fill justify-content-center align-content-between function3">
                    <i class="fas fa-calendar-minus"></i><span>取消報名</span>
                </div>
            </div>
        @endif
    </div>
@endif
