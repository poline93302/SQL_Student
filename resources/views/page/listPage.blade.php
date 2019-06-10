@extends('layout.master')
@section('content-play')
    <div class="flex-container-col" style="width: 100%">
        <div class="flex-container-row">
            <form method="post" action="{{route('excelFileGet')}}" enctype="multipart/form-data" name="getFile">
                @csrf
                <input class="btn" type="file" name="excelName" id="filename" >
                <button class="btn" type="submit" id="button">確定匯入</button>
            </form>
            <div class="flex-container-row">
                <br>
                <button class="btn" id="btn">統計功能</button>
            </div>
        </div>
{{--:std_time="{{ $std_time }}--}}
        <show-list :infos={{ $lists }}></show-list>
    </div>
@endsection

<script>
    function f() {
        let fileFullName = $('#filename').val();
        console.log(fileFullName)
    }
</script>