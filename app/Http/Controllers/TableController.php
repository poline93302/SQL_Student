<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
            'student_list'  =>  $this->linker->get_student_inter_list($student),
        ];

        return view('page.interViewTable',$data);
    }

    public function EditList(Request $req,$list_id = null)
    {
        $data=[
            'list_info' => $this->inter_info->take_form_id_info($list_id),
            'stud_inter_info' => $this->linker->get_student_inter_list($req->student),
        ];
//        echo $data;
        echo collect($data)->toJson();
    }

    public function DelList($list_id = null)
    {

        $student = str_split($list_id,8);

        $this->inter_info->del_id_form($list_id);
        $data = [
            'stud_inter_info' => $this->linker->get_student_inter_list($student[0]),
        ];
        echo collect($data)->toJson();
    }


    public function create(Request $req)
    {
        $teacher = Auth::user()['teach_name'];
        $form_id = $req->table_id!=''?$req->table_id:$req->student.Carbon::now('Asia/Hong_Kong')->format('Ymdhis');
        echo  $form_id;
        $this->inter_info->create_context_table($form_id,$req->student,$req->check_info,$req->conclusion,$req->file);      //表單資訊表
        $this->linker->create_link_table($form_id, $teacher);              //連接表
    }
}
