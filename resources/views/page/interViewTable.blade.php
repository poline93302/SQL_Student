@extends('layout.master')
@section('content-play')
    <div class="flex-container-col" style="width: 100%">
        <p style="font-size: 36px;"> 訪談名單 </p>
        <p class = "span-row-2">1.  訪談的基本資料</p>  <!-- 1. -->
        <table class = "span-row-3" style="font-size: 16px;">
            <tr>
                <td width="20%"> <span>學年 :</span> </td>
                <td width="30%">
                    <span>
                        @if(\Carbon\Carbon::now()->format('m') >= 9)
                            1{{\Carbon\Carbon::now()->format('m')}}
                        @else
                            10{{\Carbon\Carbon::now()->format('m')+1}}
                        @endif
                    </span> <span> 年 </span>
                    <span>
                        @if(\Carbon\Carbon::now()->format('m') >= 9)
                            上
                        @else
                            下
                        @endif
                    </span><span> 學期</span>
                </td>
                <td width="20%"> <span>部別 :</span> </td>
                <td width="auto"> <span>{{$student_depart}}</span> </td><!--  -->
            </tr>
            <tr>
                <td> <span>導師 :</span> </td>
                <td> <span>{{$teacher_name}}</span> </td><!--  -->
                <td> <span>學生 :</span> </td>
                <td> <span>{{$student_id}} &nbsp;&nbsp;</span> <span>{{$student_name}}</span> </td><!--  -->
            </tr>
            <tr>
                <td> <span>系別 :</span> </td>
                <td> <span>{{$teacher_class}}</span> </td><!--  -->
                <td> <span>現在時間 : </span> </td>
                <td> <span>{{\Carbon\Carbon::now('Asia/Hong_Kong')}}</span> </td><!--  -->
            </tr>
        </table>
        <table-way :stud_inter_info={{$student_list}} :stud_info=[{{$student_id}}] >
        </table-way>
    </div>

@endsection
