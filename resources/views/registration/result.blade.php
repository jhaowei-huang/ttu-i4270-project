@extends('layouts.master', ['title' => '報名結果', 'current' => 'registration'])

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
                @php($food = config('enums.food'))
                @foreach($keynotes as $keynote)
                    <tr class="keynote">
                        @if($keynote['food'] === $food[0])
                            <td class="column-select text-center color-blue">{{ $keynote['food'] }}</td>
                        @elseif($keynote['food'] === $food[1])
                            <td class="column-select text-center color-red">{{ $keynote['food'] }}</td>
                        @elseif($keynote['food'] === $food[2])
                            <td class="column-select text-center color-green">{{ $keynote['food'] }}</td>
                        @else
                            <td class="column-select text-center">{{ $keynote['food'] }}</td>
                        @endif
                        <td class="column-index text-center">{{ $keynote['index'] }}</td>
                        <td class="column-date text-center">{{ $keynote['date'] }}</td>
                        <td class="column-time text-center">{{ $keynote['time'] }}</td>
                        <td class="column-agenda">{{ $keynote['agenda'] }}</td>
                        <td class="column-speaker">{{ $keynote['speaker'] }}<br>{{ $keynote['position'] }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
