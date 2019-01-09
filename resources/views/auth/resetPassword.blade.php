@extends('layouts.master', ['title' => config('app.email_subject.resetPassword'), 'current' => ''])

@push('styles')
    <link href="{{ asset('css/resetPassword.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-2">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header lead">{{ config('app.email_subject.resetPassword') }}</div>
                    <div class="card-body">
                        @if($status > 0)
                            <div
                                class="alert alert-danger alert-fixed row justify-content-center align-content-between">
                                <i class="fas fa-times-circle fa-fw fa-2x"></i>
                                <span class="text-center mt-1">{{ $message }}</span>
                            </div>
                        @elseif($status == 0)
                            <p>姓名：<strong class="color-secondary">{{ $name }}</strong></p>
                            <p>帳號：<strong class="color-secondary">{{ $username }}</strong></p>
                            <p>email：<strong class="color-secondary">{{ $email }}</strong></p>
                            <span class="text-center mt-1">{{ $message }}</span>
                            <div class="row flex-fill justify-content-center mt-3">
                                <form id="form-resetPassword" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $token }}" name="token"/>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="新密碼"
                                                   id="password" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-key fa-fw"></i></span>
                                            </div>
                                            <input type="password" class="form-control" placeholder="再次輸入新密碼"
                                                   id="confirm_password" name="confirm_password">
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
                                    <div class="form-inline mt-1 justify-content-center">
                                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                                id="btn-submit">設定新的密碼
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src='{{ asset('js/resetPassword.js') }}'></script>
@endpush
