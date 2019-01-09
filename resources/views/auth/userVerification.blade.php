@extends('layouts.master', ['title' => config('app.email_subject.verification'), 'current' => ''])

@push('styles')
@endpush

@section('content')
    <div class="container mt-5 pt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header">{{ config('app.email_subject.verification') }}</div>
                    @auth
                        <div class="card-body">
                            @if(Auth::user()->verification == false)
                                @if(Session::has('message'))
                                    <div
                                        class="alert alert-info alert-fixed row justify-content-center align-content-between"
                                        role="alert">
                                        <i class="fas fa-check-circle fa-fw fa-2x"></i>
                                        <span
                                            class="text-center mt-1">{{ Session::pull('message') }}</span>
                                    </div>
                                @endif
                                <p>{{ Auth::user()->name }} 您好</p>
                                <p>系統已經在 <strong
                                        class="color-primary">{{ Auth::user()->userVerification->updated_at }}</strong>
                                    寄送一封驗證信至 <strong class="color-secondary">{{ Auth::user()->email }}</strong></p>
                                <p>您必須要認證email才能進行報名</p>
                                <br>
                                <p>若您的沒有收到，請在下方再填寫一次您的email</p>
                                <p>若您的email填寫錯誤，請在下方輸入新的email</p>
                                <p>系統將會重新寄送</p>
                                <form id="form-resend" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="fa fa-at"></i></span>
                                            </div>
                                            <input type="text" class="form-control" placeholder="email"
                                                   id="email" name="email">
                                        </div>
                                    </div>
                                    <div class="alert alert-primary row justify-content-center align-content-between">
                                        <button type="button" class="close" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <i class="fas fa-cog fa-spin fa-2x loading-icon"></i>
                                        <span class="validation-area text-center mt-1"></span>
                                    </div>
                                    <div class="row justify-content-center my-2">
                                        <button type="submit"
                                                class="btn btn-primary mx-3 mx-md-0 flex-fill flex-md-grow-0"
                                                id="btn-submit" name="btn-submit">重新寄送
                                        </button>
                                    </div>
                                </form>
                            @else
                                <p>{{ Auth::user()->name }} 您好</p>
                                <p>您的帳號：<strong class="color-secondary">{{ Auth::user()->username }}</strong></p>
                                <p>您的email：<strong class="color-secondary">{{ Auth::user()->email }}</strong></p>
                                @if(Session::has('message'))
                                    <div
                                        class="alert alert-info alert-fixed row justify-content-center align-content-between"
                                        role="alert">
                                        <i class="fas fa-check-circle fa-fw fa-2x"></i>
                                        <span
                                            class="text-center mt-1">{{ Session::pull('message') }}</span>
                                    </div>
                                @endif
                                <div
                                    class="alert alert-success alert-fixed row justify-content-center align-content-between">
                                    <i class="fas fa-check-circle fa-fw fa-2x"></i>
                                    <span class="text-center mt-1">您的帳號email已經驗證成功</span>
                                </div>
                                <p>現在可以：</p>
                                @include('layouts.function', ['all'=>false, 'register'=>true, 'inquire'=>true, 'cancel'=>true])
                            @endif
                        </div>
                    @endauth
                    @guest
                        <div class="card-body">
                            <p>很抱歉，目前您沒有登入</p>
                            <p>您可以執行下列動作：</p>
                            @include('layouts.function', ['all'=>false, 'signup'=>true, 'signin'=>true, 'forget'=>true])
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="{{ asset('js/userVerification.js') }}"></script>
@endpush
