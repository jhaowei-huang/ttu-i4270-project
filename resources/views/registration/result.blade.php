@extends('layouts.master', ['title' => '線上報名', 'current' => 'registration'])

@push('styles')
    <link href="{{asset('css/onlineRegister.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        @if(Session::has('message'))
            <div
                class="alert alert-info alert-fixed row justify-content-center align-content-between">
                <span class="text-center mt-1">{{ Session::pull('message') }}</span>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-sm table-striped table-bordered">
                <thead class="thead-light">
                <tr>
                    <th class="column-select">供餐</th>
                    <th class="column-index">編號</th>
                    <th class="column-date">日期</th>
                    <th class="column-time">時間</th>
                    <th class="column-agenda">議程</th>
                    <th class="column-speaker">演講者</th>
                </tr>
                </thead>
                <tbody>
                {{--@foreach(Auth::user()->registrations)--}}
                    {{--<tr class="keynote">--}}
                        {{--<th class="column-select">供餐</th>--}}
                        {{--<th class="column-index">編號</th>--}}
                        {{--<th class="column-date">日期</th>--}}
                        {{--<th class="column-time">時間</th>--}}
                        {{--<th class="column-agenda">議程</th>--}}
                        {{--<th class="column-speaker">演講者</th>--}}
                    {{--</tr>--}}
                {{--@endforeach--}}
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
