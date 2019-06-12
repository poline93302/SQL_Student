@extends('layout.master')
@section('content-play')
    <div class="flex-container-col" style="width: 100%">
        <p class="flex" style="font-size: 36px;justify-content:space-between;">
            <span style="margin-left: 12%;font-size: 40px">統計</span>
            <button style="border-radius: 5px;background-color: gray;color: whitesmoke;width: 150px" onclick="location.href='{{route('loginSuccess')}}'">返回主界面</button>
        </p>
        <tone-fater> </tone-fater>
    </div>
@endsection