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
            <div class="row mt-5 ml-1 mb-3">請勾選欲報名的場次：</div>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th class="column-select">全選</th>
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
                <div class="col-12 col-md-4">
                    <div class="mb-3 text-center"><strong>請確認您的個人資料與報名場次是否正確</strong></div>
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
                </div>
                <div class="col-12 col-md-8 mt-2 mt-md-0">
                    <div class="mb-3 text-center"><strong>共要參加&nbsp<span class="color-blue chosen-keynote-number">0</span>&nbsp場議程，其中有&nbsp<span
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
            </div>
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
