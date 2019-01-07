@extends('layouts.master', ['title' => '登入會員', 'current' => ''])

@push('styles')
    <link href="{{asset('css/signIn.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 align-content-center">
                <h3 class="text-center mb-3">登入會員</h3>
                @if(Session::has('updatePassword_message'))
                    <div class="d-flex flex-fill mb-3 justify-content-center success">
                        <i class="far fa-smile fa-2x"></i>
                        <span class="mt-1">{{ Session::pull('updatePassword_message')}}</span>
                    </div>
                @endif
                @if(Session::has('updateEmail_message'))
                    <div class="d-flex flex-fill mb-3 justify-content-center success">
                        <i class="far fa-smile fa-2x"></i>
                        <span class="mt-1">{{ Session::pull('updateEmail_message')}}</span>
                    </div>
                @endif
                <form id="form-signIn" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="帳號或是email"
                                   id="username" name="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-key"></i></span>
                            </div>
                            <input type="password" class="form-control" placeholder="密碼"
                                   id="password" name="password">
                        </div>
                    </div>
                    <div class="alert alert-primary row justify-content-center align-content-between">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fas fa-cog fa-spin fa-2x loading-icon"></i>
                        <span class="validation-area text-center mt-1"></span>
                    </div>
                    <div class="form-inline mt-2">
                        <div class="input-group my-2 mt-md-0 flex-fill">
                            <label class="switch mr-2">
                                <input type="checkbox" class="success" id="remember" name="remember">
                                <span class="slider round"></span>
                            </label>
                            <label id="remember-label" for="remember">在此裝置記住我</label>
                        </div>
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                id="btn-submit">登入
                        </button>
                    </div>
                </form>
                @include('layouts.function', ['all' => false, 'signup' => true, 'forget' => true])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/signIn.js') }}"></script>
@endpush
