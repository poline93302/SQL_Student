@extends('layout.master')
@section('content-play')
    <div class="flex-container-col" style="width: 100%">
        <p style="font-size: 36px;"> 訪談名單 </p>
        <p class = "span-row-2">1.  訪談的基本資料</p>  <!-- 1. -->
        <table class = "span-row-3" style="font-size: 16px;">
            <tr>
                <td width="10%"> <span>學年 :</span> </td>
                <td width="40%">
                    <span>{{sysTime}}</span> <span> 年 </span> <span> {{sysTime > y = 9 }} </span><span> 學期</span>
                </td>
                <td width="10%"> <span>部別 :</span> </td>
                <td width="40%"> <span>{{std.info}} of 部門</span> </td><!--  -->
            </tr>
            <tr>
                <td> <span>導師 :</span> </td>
                <td> <span>{{teac.info}} of 導師ID</span> </td><!--  -->
                <td> <span>學生 :</span> </td>
                <td> <span>{{std.info}} of 學號</span> <span>{{std.info}} of 姓名</span> </td><!--  -->
            </tr>
            <tr>
                <td> <span>系別 :</span> </td>
                <td> <span>{{teac.info}} of 班級</span> </td><!--  -->
                <td> <span>訪談時間 : </span> </td>
                <td> <span>{{sysTime.info}}</span> </td><!--  -->
            </tr>
        </table>

        <inter-view-project :data = ></inter-view-project>

        <p class="span-row-2" style="padding-bottom: 10px;">3.  結語 <img src="../src/photo/edit.png"></img>   </p>      <!-- 3. -->
        <div class="span-row-3">
            <input type="checkbox"/><span>持續關懷</span> &nbsp;&nbsp;&nbsp;
            <input type="checkbox"/><span>轉介學輔中心</span> &nbsp;&nbsp;&nbsp;
            <input type="checkbox"/><span>其他</span>
        </div>

        <p class="span-row-2" style="padding-bottom: 10px;">4.  檔案上傳</p>      <!-- 4. -->
        <div class="span-row-3">
            <input type="file" class="btn" value="照片/影片上傳">
        </div>

        <span class="span-row-2" style="padding-bottom: 10px;">    <!-- btn -->
                    <div class="btn-grouP" style="padding-left:80%;">
                        <button class="btn">送出</button>
                        <button class="btn">取消</button>
                    </div>
                </span>
    </div>
@endsection
