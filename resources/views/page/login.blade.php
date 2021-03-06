@extends('layout.master')
@section('content-play')
<div class="flex flex-container-rowR text-ali-center" style="width: 100%">
    <div class="card">
        <img src="image/YL.svg" style="width: 150px;height: 150px;align-self: center;" ></img>
        <form action = {{route('login')}} method='post' enctype='multipart/form-data'>
            <div class="flex-container-row">
                <label>帳號 : </label>
                <input type="text"  name="teach_id" style="border:1px black solid;text-align: left;" name="teacher_name" placeholder="請輸入帳號"/>
            </div>
            <div class="flex-container-row">
                <label>密碼 : </label>
                <input type="password" name="teach_password" style="border:1px black solid;text-align: left" placeholder="請輸入密碼"/>
            </div>
            <div class="flex-container-row btn-group">
                <button type="submit" class="btn">登入</button>&nbsp;&nbsp; &nbsp;
                <button type="button" class="btn" id="regSuc" onclick="Get_Statue();">註冊</button>
            </div>
            @csrf
        </form>
{{--        @if--}}
        <div class="modal" id="Modal_Reg">
            <modal-show info="modal"></modal-show>
        </div>
    </div>
</div>
@endsection

