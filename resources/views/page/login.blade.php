@extends('layout.master')
@section('content-play')
<div class="flex flex-container-rowR text-ali-center" style="width: 100%">
    <div class="card">
        <img src="../src/photo/YL.svg" style="width: 150px;height: 150px;align-self: center;"></img>
        <div class="flex-container-row">
            <label>帳號 : </label>
            <input type="text" style="border:1px black solid;text-align: left; "/>
        </div>
        <div class="flex-container-row">
            <label>密碼 : </label>
            <input type="password" style="border:1px black solid;text-align: left"/>
        </div>
        <div class="flex-container-row btn-group">
            <input type="button" value="登入" class="btn"/> &nbsp; &nbsp;
            <input type="button" value="註冊" class="btn" @click=""/>
        </div>
    </div>
</div>
@endsection
