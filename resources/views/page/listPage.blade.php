@extends('layout.master')
@section('content-play')
    <div class="flex-container-col" style="width: 100%">
        <div class="flex-container-row">
            <button class="btn">匯入班級資料</button>
            <button class="btn">複雜查詢功能</button>
        </div>
        <table width="100%">
            <tr>
                <th>學號</th>
                <th>姓名</th>
                <th>姓別</th>
                <th>地址</th>
                <th>Action</th>
            </tr>
{{--            <show-list :infos="@{{req}}">--}}

{{--            </show-list>--}}
        </table>
    </div>
@endsection