@extends('layouts.master', ['title' => '交通資訊', 'current' => 'map'])

@push('styles')
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-3">
        <div class="row">
            <div class="col-md-6 col-12 mb-3 mb-md-0 justify-content-center">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3614.7826965076224!2d121.51738271420592!3d25.041447583968882!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3442a976b82a6343%3A0xfa4b50ed14c4d879!2z6Ie65aSn6Yar6Zmi5ZyL6Zqb5pyD6K2w5Lit5b-D!5e0!3m2!1szh-TW!2sit!4v1541492582943"
                    frameborder="0" allowfullscreen></iframe>
            </div>
            <div class="col-md-6 col-12">
                <div class="row justify-content-around">
                    <div id="btn"
                         class="btn col-4 color-primary d-flex justify-content-center align-content-between indicator">
                        <i class="fas fa-map-marker-alt fa-2x"></i><span>資訊</span>
                    </div>
                    <div id="btn-mrt"
                         class="btn col-4 color-secondary d-flex justify-content-center align-content-between indicator">
                        <i class="fas fa-subway fa-2x"></i><span>捷運</span>
                    </div>
                    <div id="btn-bus"
                         class="btn col-4 color-third d-flex justify-content-center align-content-between indicator">
                        <i class="fas fa-bus-alt fa-2x"></i><span>公車</span>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center">
                    <div id="content" class="content mt-2 mx-4">
                        <h3>2018 TIFE 會議地點</h3>
                        <h5 class="color-red mt-3">台大醫院國際會議中心</h5>
                        <div class="row mt-3 justify-content-center">
                            <p>台大醫院國際會議中心交通網絡極為便捷，地處中央聯合辦公大樓斜對面</p>
                            <p>緊臨台大醫院東址，東臨林森南路、西臨中山南路、南臨仁愛路、北臨徐州路</p>
                            <p>距台北火車站僅5分鐘車程，距松山機場約20分鐘</p>
                            <p>距大眾捷運路網(紅線－台大醫院站 / 藍線－善導寺站)步行約10分鐘即可達</p>
                        </div>
                    </div>
                    <div id="content-mrt" class="content mt-2 mx-4">
                        <div>
                            <strong class="color-red">淡水北投線(紅線)</strong>
                            <div class="row mt-3 justify-content-center">台大醫院站二號出口
                                <i class="fas fa-chevron-right color-red align-middle"></i>常德街約向東走
                                <i class="fas fa-chevron-right color-red align-middle"></i>左轉中山南路
                                <i class="fas fa-chevron-right color-red align-middle"></i>右轉徐州路
                            </div>
                        </div>
                        <div class="mt-4">
                            <strong class="color-blue">板南線(藍線)</strong>
                            <div class="row mt-3 justify-content-center">善導寺站二號出口
                                <i class="fas fa-chevron-right color-blue"></i>林森南路約向西南走
                                <i class="fas fa-chevron-right color-blue"></i>右轉至徐州路
                            </div>
                        </div>
                    </div>
                    <div id="content-bus" class="content mt-2">
                        <div class="table-responsive">
                            <table class="table table-sm table-striped">
                                <thead class="thead-light">
                                <tr>
                                    <th class="column-station">站點</th>
                                    <th class="column-route">公車路線</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>捷運善導寺站</td>
                                    <td>0南/15/22/202/212/212直達/220/232/232副/257/262/265/299/605/671</td>
                                </tr>
                                <tr>
                                    <td>成功中學站
                                        (濟南路林森南路口)</td>
                                    <td>65/297/671</td>
                                </tr>
                                <tr>
                                    <td>開南商工站
                                        (近徐州路口)</td>
                                    <td>0南/15/22/208/295/297/671</td>
                                </tr>
                                <tr>
                                    <td>台大醫院站</td>
                                    <td>22/15/615/227/648/648綠/中山幹線/208/208直達/37/坪林-台北/烏來-台北</td>
                                </tr>
                                <tr>
                                    <td>仁愛林森路口站
                                        (林森南路口)</td>
                                    <td>295/297/15/22/671</td>
                                </tr>
                                <tr>
                                    <td>仁愛林森路口站
                                        (仁愛路口)</td>
                                    <td>245/261/37/249/270/263/621/651/630</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/map.js') }}"></script>
@endpush
