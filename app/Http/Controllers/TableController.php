<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\studentService;
use App\Services\interviewtableService;
use App\Services\teacstudinterService;
use Illuminate\Support\Facades\Auth;

class TableController extends Controller
{

    protected $student_info;
    protected $inter_info;
    protected $linker;

    public function __construct(studentService $student_info,interviewtableService $inter_info,teacstudinterService $linker)
    {
        $this->student_info = $student_info;
        $this->inter_info   = $inter_info;
        $this->linker       = $linker;
    }

    public function createList(Request $req , $student = null)
    {
        //表單訊息 student : depart , id , name teacher : name , class
        $data=[
            'student_name'  =>  $this->student_info->get_student_info($student)['stud_name'],
            'student_id'    =>  $student,
            'student_depart'=>  $this->student_info->get_student_info($student)['stud_depart'],
            'teacher_name'  =>  $req->user()['teach_name'],
            'teacher_class' =>  $req->user()['teach_class'],
        ];
        return view('page.interViewTable',$data);
    }

    public function EditList()
    {
        dd('Edit');
    }

    public function DelList()
    {
        dd('del');
    }

    public function create(Request $req)
    {
        $teacher = Auth::user()['teach_name'];
//        echo $req->file;

        $this->inter_info->create_context_table($req->student,$req->check_info,$req->conclusion,$req->file);      //表單資訊表
        $this->linker->create_link_table($req->student, $teacher);              //連接表
    }
}
