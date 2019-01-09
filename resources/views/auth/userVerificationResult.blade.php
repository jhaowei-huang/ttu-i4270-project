@extends('layouts.master', ['title' => config('app.email_subject.verification'), 'current' => ''])

@push('styles')
@endpush

@section('content')
    <div class="container mt-5 pt-2">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header">{{ config('app.email_subject.verification') }}</div>
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
                            <div
                                class="alert alert-success alert-fixed row justify-content-center align-content-between">
                                <i class="fas fa-check-circle fa-fw fa-2x"></i>
                                <span class="text-center mt-1">{{ $message }}</span>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
