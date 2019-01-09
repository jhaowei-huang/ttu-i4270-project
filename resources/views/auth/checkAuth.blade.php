@php
    $msg = Session::has('signIn_message') ? Session::pull('signIn_message') : '驗證結果';
@endphp

@extends('layouts.master', ['title' => '', 'current' => ''])

@push('styles')
    {{--    <link href="{{asset('css/signIn.css')}}" rel="stylesheet">--}}
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <div class="col-12 mx-2">
                <div class="card">
                    @auth
                        <div class="card-header">$msg</div>
                        <div class="card-body">
                            <p class="color-primary">{{ Auth::user()->name }} 您好</p>
                        </div>
                    @endauth
                    @guest
                        <div class="card-header color-danger">$msg</div>
                        <div class="card-body">
                            <p class="color-danger">很抱歉，目前沒有登入喔</p>
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
    {{--<script src="{{ asset('js/signIn.js') }}"></script>--}}
@endpush
