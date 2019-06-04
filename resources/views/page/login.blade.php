@extends('layout.master')
@section('content-play')
<div class="flex flex-container-rowR text-ali-center" style="width: 100%">
    <div class="card">
        <img src="image/YL.svg" style="width: 150px;height: 150px;align-self: center;"></img>
        <form action = {{route('login')}} method='post'>
            <div class="flex-container-row">
                <label>帳號 : </label>
                <input type="text"  name="teach_id" style="border:1px black solid;text-align: left;" name="teacher_name"/>
            </div>
            <div class="flex-container-row">
                <label>密碼 : </label>
                <input type="password" name="teach_password" style="border:1px black solid;text-align: left"/>
            </div>
            <div class="flex-container-row btn-group">
                <button type="submit" class="btn">登入</button>&nbsp;&nbsp; &nbsp;
                <button type="button" class="btn">註冊</button>
            </div>
            @csrf
        </form>
    </div>
    <modal-show></modal-show>
</div>

@endsection