@extends('layouts.master', ['title' => '修改email', 'current' => ''])

@push('styles')
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4 align-content-center">
                <h3 class="text-center mb-3">修改email</h3>
                @if(Session::has('message'))
                    <div
                        class="alert alert-info alert-fixed row justify-content-center align-content-between"
                        role="alert">
                        <i class="fas fa-check-circle fa-fw fa-2x"></i>
                        <span
                            class="text-center mt-1">{{ Session::pull('message') }}</span>
                    </div>
                @endif
                <p>請輸入新的email</p>
                <p>注意!! 修改email完成後將會<strong class="color-third">登出</strong>並且需要<strong
                        class="color-primary">重新驗證</strong></p>
                <p>您現在的email：<strong class="color-secondary">{{ Auth::user()->email }}</strong></p>
                <form id="form-updateEmail" method="POST">
                    @csrf
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-fw fa-key"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="新的email"
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
                    <div class="row justify-content-center my-0 my-md-2">
                        <button type="submit" class="btn btn-primary mx-3 mx-md-0 flex-fill flex-md-grow-0"
                                id="btn-submit" name="btn-submit">修改
                        </button>
                    </div>
                </form>
                @include('layouts.function', ['all' => false, 'profile' => true])
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/updateEmail.js') }}"></script>
@endpush
