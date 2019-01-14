@extends('layouts.master', ['title' => '線上報名', 'current' => 'registration'])

@push('styles')
    <link href="{{asset('css/onlineRegister.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="row justify-content-around fixed-top mt-5 indicator">
            <div id="btn-step1" class="btn btn-lg btn-outline-primary col-4">
                勾選場次
            </div>
            <div id="btn-step2" class="btn btn-lg btn-outline-info col-4">
                供餐選擇
            </div>
            <div id="btn-step3" class="btn btn-lg btn-outline-danger col-4">
                確認送出
            </div>
        </div>
        <div id="step1" class="step">
            <div class="row mt-5 ml-1 mb-3">請勾選欲報名的場次：</div>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="column-select">
                            <div id="btn-selectAll" class="color-green">
                                全選
                            </div>
                        </th>
                        <th class="column-index">編號</th>
                        <th class="column-date">日期</th>
                        <th class="column-time">時間</th>
                        <th class="column-agenda">議程</th>
                        <th class="column-speaker">演講者</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="keynote">
                        <td class="column-select">
                            <label class="switch mr-2">
                                <input type="checkbox" class="select">
                                <span class="slider"></span>
                            </label>
                        </td>
                        <td class="column-index text-center"></td>
                        <td class="column-date text-center"></td>
                        <td class="column-time text-center"></td>
                        <td class="column-agenda"></td>
                        <td class="column-speaker"></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="step2" class="step">
            <div class="mt-5 ml-1 mb-3">
                <p>目前勾選&nbsp<span class="color-blue chosen-keynote-number">0</span>&nbsp場議程，其中有&nbsp<span
                        class="color-red chosen-food-number">0</span>&nbsp場提供餐點</p>
                <p>請選擇<strong class="color-red">葷食</strong>、<strong class="color-green">素食</strong>、或<strong
                        class="color-blue">不需要</strong></p>
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
                        <tr class="keynote-food">
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="step3" class="step">
            <div class="row mt-5 mb-3 mt-1 ">
                <div class="col-12 justify-content-center mx-auto">
                    <div class="mb-3 text-center"><strong>共要參加&nbsp<span
                                class="color-blue chosen-keynote-number">0</span>&nbsp場議程，其中有&nbsp<span
                                class="color-red chosen-food-number">0</span>&nbsp場提供餐點</strong></div>
                    <div class="table-responsive">
                        <table class="table table-sm table-striped table-bordered table-confirm">
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
                            <tr class="keynote-confirm">
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-md-4 justify-content-center mx-auto">
                    <div class="mt-3 mb-3 text-center"><strong>請確認您的個人資料與報名場次是否正確</strong></div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user fa-fw"></i>帳號</span>
                        </div>
                        <input type="text" class="form-control" placeholder="帳號" value="123"
                               disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-at fa-fw"></i>信箱</span>
                        </div>
                        <input type="text" class="form-control" placeholder="email" value="123@gmail.com"
                               disabled>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-font fa-fw"></i>姓名</span>
                        </div>
                        <input type="text" class="form-control" placeholder="姓名" value="黃昭維"
                               disabled>
                    </div>
                    <div class="row justify-content-center mt-2">
                        <div class="g-recaptcha"
                             data-sitekey="{{ config('app.google_recaptcha_key') }}"></div>
                    </div>
                    <div class="alert alert-primary row justify-content-center align-content-between mt-2">
                        <button type="button" class="close col-md-4" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fas fa-cog fa-spin fa-2x loading-icon"></i>
                        <span class="validation-area text-center mt-1"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div id="btn-previous" class="btn btn-lg btn-outline-secondary mr-1">
                上一步
            </div>
            <div id="btn-next" class="btn btn-lg btn-outline-success ml-1">
                下一步
            </div>
            <button class="btn btn-outline-primary ml-1"
                    id="btn-submit">報名
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="{{ asset('js/onlineRegister.js') }}"></script>
@endpush
