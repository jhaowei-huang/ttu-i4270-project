@extends('layouts.master', ['title' => '個人檔案', 'current' => ''])

@push('styles')
@endpush

@section('content')
    <div class="container mt-5 pt-4 pt-md-4">
        <div class="row">
            <div class="col-12 col-md-6">
                @if(Session::has('message'))
                    <div
                        class="alert alert-info alert-fixed row justify-content-center align-content-between"
                        role="alert">
                        <i class="fas fa-check-circle fa-fw fa-2x"></i>
                        <span
                            class="text-center mt-1">{{ Session::pull('message') }}</span>
                    </div>
                @endif
                {{--http://tinygraphs.com/squares/12314awfadsf?theme=bythepool&numcolors=3&size=220&fmt=svg--}}
                <div class="row justify-content-center">
                    <img
                        src="http://tinygraphs.com/squares/{{ Auth::user()->username }}?theme=seascape&numcolors=4&size=200&fmt=svg"
                        alt="Avatar" class="avatar">
                </div>
                <div class="form-group mt-4 mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-user mx-auto"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="帳號" value="{{ Auth::user()->username }}"
                               disabled>
                    </div>
                </div>
                <div class="form-group mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-key mx-auto"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="password" value="******" disabled>
                        <div class="input-group-append">
                            <button id="btn-editPassword" class="btn btn-sm btn-outline-danger input-group-text"><i
                                    class="fa fa-edit fa-fw mr-1"></i>
                                修改
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group mx-2">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-at mx-auto"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="email" value="{{ Auth::user()->email }}"
                               disabled>
                        <div class="input-group-append">
                            @if(Auth::user()->verification == 1)
                                <btn class="btn btn-sm btn-outline-success input-group-text color-green"><i
                                        class="fas fa-check-circle fa-fw mr-1"></i>
                                    已驗證
                                </btn>
                            @else
                                <btn class="btn btn-sm btn-outline-danger input-group-text color-red"><i
                                        class="fas fa-times-circle fa-fw mr-1"></i>
                                    未驗證
                                </btn>
                            @endif
                        </div>
                        <div class="input-group-append">
                            <button id="btn-editEmail" class="btn btn-sm btn-outline-danger input-group-text"><i
                                    class="fa fa-edit fa-fw mr-1"></i>
                                修改
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <form id="form-profile" method="POST">
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-font fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="姓名"
                                   id="name" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-map-marked-alt fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="地址"
                                   id="address" name="address" value="{{ Auth::user()->address }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-building fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="公司部門"
                                   id="department" name="department" value="{{ Auth::user()->department }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-id-card fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="職稱"
                                   id="position" name="position" value="{{ Auth::user()->position }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fa fa-phone fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="電話"
                                   id="phone" name="phone" value="{{ Auth::user()->phone }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="電話分機"
                                   id="phone_ext" name="phone_ext" value="{{ Auth::user()->phone_ext }}">
                        </div>
                    </div>
                    <div class="form-group mx-2">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-fax fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="傳真"
                                   id="fax" name="fax" value="{{ Auth::user()->fax }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-hashtag fa-fw mx-auto"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="傳真分機"
                                   id="fax_ext" name="fax_ext" value="{{ Auth::user()->fax_ext }}">
                        </div>
                    </div>
                    <div class="row mt-2 mb-2 justify-content-center">
                        <div class="g-recaptcha"
                             data-sitekey="{{ config('app.google_recaptcha_key') }}"></div>
                    </div>
                    <div class="alert alert-primary row justify-content-center align-content-between">
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <i class="fas fa-cog fa-spin fa-2x loading-icon"></i>
                        <span class="validation-area text-center mt-1"></span>
                    </div>
                    <div class="row mt-1 mx-2 justify-content-center">
                        <button type="submit" class="btn btn-primary flex-fill flex-md-grow-0"
                                id="btn-submit">更新個人檔案
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <!-- load Google recaotcha service -->
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="{{ asset('js/profile.js') }}"></script>
@endpush
