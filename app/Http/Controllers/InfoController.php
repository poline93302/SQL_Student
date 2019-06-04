<?php

namespace App\Http\Controllers;

use App\Services\teacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentImport;

class InfoController extends Controller
{
    protected $teacher_Info;

    public function __construct(teacherService $teacher_Info)
    {
        $this->teacher_Info = $teacher_Info;
    }

    public function index(){
        return view('page.login');
    }

    public function showInfo($teacher_info = null)
    {
        Auth::id('teacher_id');
        $data=[
            'teacher_id' => $teacher_info
        ];
        return view('page.listPage',$data);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    public function registered()
    {
        dd('1123');
    }

    public function import(Request $req)
    {

//        $path = $req->file('excelName')->getBasename();
//        $path = $req->get('getFilename');

//        $path =$req->__construct($req->file('excelName'));
        $path2 = '/Users/yinglu_chen/Downloads/user.xlsx';
        Excel::import(new StudentImport, $path2);
//        $path = $request->file('excelName')->getRealPath();
//        dd($path);
        echo "<script> alert('輸入完成') </script>";
        return Redirect::to('/info');
    }
}
