@extends('layouts.master', ['title' => '忘記密碼', 'current' => ''])

@push('styles')
    <link href="{{asset('css/forgetPassword.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 align-content-center">
                <h3 class="text-center mb-3">忘記密碼</h3>
                <p>請提供您的email，系統將會寄送一封含有重設密碼連結的信件給您</p>
                <p>您可以依照信件提示來重新設定密碼，若超過 {{ env('EMAIL_EXPIRED_TIME') }} 分鐘內沒有完成，
                    必須重新提出一次申請</p>
                <form id="form-forget" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="email"
                                   id="email" name="email">
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3 mb-2">
                        <div class="g-recaptcha"
                             data-sitekey="{{ config('app.google_recaptcha_key') }}"></div>
                    </div>
                    <div class="alert alert-primary row justify-content-center align-content-between">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fas fa-cog fa-spin fa-2x loading-icon"></i>
                        <span class="validation-area text-center mt-1"></span>
                    </div>
                    @if(Session::has('message'))
                        <div
                            class="alert alert-info alert-fixed row justify-content-center align-content-between"
                            role="alert">
                            <i class="fas fa-check-circle fa-fw fa-2x"></i>
                            <span
                                class="text-center mt-1">{{ Session::pull('message') }}</span>
                        </div>
                    @endif
                    <div class="form-inline mt-2 justify-content-center">
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                id="btn-submit">寄送重設密碼的信件
                        </button>
                    </div>
                </form>
                @include('layouts.function', ['all' => false, 'signup' => true, 'signin' => true])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="{{ asset('js/forgetPassword.js') }}"></script>
@endpush
