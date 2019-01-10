@extends('layouts.master', ['title' => '線上報名', 'current' => 'registration'])

@push('styles')
    <link href="{{asset('css/onlineRegister.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-center fixed-top mt-5 indicator">
            <div id="btn-step1" class="btn btn-lg btn-outline-primary col-3">
                1. 場次
            </div>
            <div id="btn-step2" class="btn btn-lg btn-outline-info col-3">
                2. 供餐
            </div>
            <div id="btn-step3" class="btn btn-lg btn-outline-danger col-3">
                3. 確認
            </div>
            <div id="btn-step4" class="btn btn-lg btn-outline-success col-3">
                4. 完成
            </div>
        </div>
        <div id="step1" class="step">
            <div class="row mt-5 ml-2 mb-3">請勾選欲報名的場次：</div>
            <div class="table-responsive">
                <table class="table table-sm table-striped  table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="column-checkBox">勾選</th>
                        <th class="column-date">日期</th>
                        <th class="column-time">時間</th>
                        <th class="column-agenda">議程</th>
                        <th class="column-speaker">演講者</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="keynote">
                        <td class="column-checkBox">
                            <label class="switch mr-2">
                                <input type="checkbox" class="checkBox">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td class="column-date"></td>
                        <td class="column-time"></td>
                        <td class="column-agenda"></td>
                        <td class="column-speaker"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="step2" class="step">
            <div class="mt-5 ml-2 mb-3">
                <p>目前勾選<span id="chosen-keynote-number">0</span>場議程，其中有<span id="chosen-food-number">0</span>場提供餐點</p>
                <p>請選擇葷食、素食、或不需要</p>
            </div>
        </div>
        <div id="step3" class="step">
            <div class="row mt-5 ml-3 mb-3">333333</div>
        </div>
        <div id="step4" class="step">
            <div class="row mt-5 ml-3 mb-3">444444</div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="btn btn-lg btn-outline-primary btn-previous">
                上一步
            </div>
            <div class="btn btn-lg btn-outline-info btn-next">
                下一步
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/onlineRegister.js') }}"></script>
@endpush
