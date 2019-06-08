<?php

namespace App\Http\Controllers;

use App\Services\studentService;
use App\Services\interviewtableService;
use App\Entities\Teacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;

class InfoController extends Controller
{
    protected $student_List;
    protected $inter_Info;

    public function __construct(studentService $student_List,interviewtableService $inter_Info)
    {
        $this->student_List = $student_List;
        $this->inter_Info   = $inter_Info;
    }

    public function index(){
        return view('page.login');
    }

    public function showInfo()
    {
        Auth::id('teacher_id');

        $data=[
            'lists'=> $this->student_List->get_list(Auth::user()),
            'std_time' => $this->inter_Info->count_linker(),
        ];
        return view('page.listPage',$data);
    }

    public function updateShow(Request $req)
    {
        $data=[
            'lists'=> $this->student_List->get_change_list(Auth::user(),$req->student_key),
        ];


        echo collect($data)->toJson();
//        return view('page.listPage',$data);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    public function registered(Request $req)
    {
        Teacher::create([
            'teach_id'      => $req->input('regID'),
            'teach_name'    => $req->input('regName'),
            'password'=> Hash::make($req->input('regPassword')),
            'teach_class'   => $req->input('regClass'),
        ]);
        echo "<script>alert('註冊成功')</script>";
        return Redirect::to('/login');
    }

    public function import(Request $req)
    {
//        抓取檔案格式
        $type = $req->file('excelName')->extension();
//          原始名稱
        $name = $req->file('excelName')->getClientOriginalName();
//          放置地方
        $localpath = '/Users/yinglu_chen/SQL_Student/public/excelData/'.$name;
//          抓取暫存檔
        $path = $req->file('excelName')->getPathname();
        //判斷檔名
        if($type === 'xlsx'){
//          轉換檔案
            move_uploaded_file($path,$localpath);
            Excel::import(new StudentImport, $localpath);
            echo "<script> alert('輸入完成') </script>";
        }else{
            echo "<script> alert('請輸入正確格式之檔案') </script>";
        }
        return Redirect::to('/info');
    }

    public function student_time($id = null){
//        dd($this->student_List->get_student_time($id));
        return $this->student_List->get_student_time($id);
    }
}
