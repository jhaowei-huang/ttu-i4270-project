@extends('layouts.master', ['title' => '聯絡我們', 'current' => 'contact'])

@push('styles')
    <link href="{{asset('css/contact.css')}}" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5 pt-4">
        <div class="table-responsive">
            <table class="table table-sm table-striped">
                <thead class="thead-light">
                <tr>
                    <th class="column"></th>
                    <th class="column-name">姓名</th>
                    <th class="column-phone">電話</th>
                    <th class="column-fax">傳真</th>
                    <th class="column-email">email</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>大會聯絡人</td>
                    <td>尚曼華 小姐</td>
                    <td>02-22670321#6003</td>
                    <td>02-22689834</td>
                    <td>mhsheng.0805@ttri.org.tw</td>
                </tr>
                <tr>
                    <td>研討會聯絡人</td>
                    <td>林美秀 小姐</td>
                    <td>02-22670321#1803</td>
                    <td>02-22689834</td>
                    <td>mhlin.765@ttri.org.tw</td>
                </tr>
                <tr>
                    <td>研討會聯絡人</td>
                    <td>詹素妹 小姐</td>
                    <td>02-22670321#6006</td>
                    <td>02-22689834</td>
                    <td>smchan.1310@ttri.org.tw</td>
                </tr>
                <tr>
                    <td>媒體聯絡人</td>
                    <td>尚曼華 小姐</td>
                    <td>0920-608666</td>
                    <td>02-22689834</td>
                    <td>mhsheng.0805@ttri.org.tw</td>
                </tr>
                <tr>
                    <td>媒體聯絡人</td>
                    <td>江淑美 小姐</td>
                    <td>0985-710267</td>
                    <td>02-22689834</td>
                    <td>smchiang.0527@ttri.org.tw</td>
                </tr>
                <tr>
                    <td>媒體聯絡人</td>
                    <td>尚曼華 小姐</td>
                    <td>0938-178908</td>
                    <td>02-22689834</td>
                    <td>cyhsieh.1181@ttri.org.tw</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
