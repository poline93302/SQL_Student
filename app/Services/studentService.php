<?php

namespace App\Services;
use App\Repositories\studentRepository;
use App\Repositories\linkerRepository;
use App\Repositories\studentViewRepository;
use Illuminate\Support\Facades\Auth;

class studentService
{
    protected $student_List;
    protected $list_info;

    public function __construct(linkerRepository $list_info,studentViewRepository $student_info)
    {
        $this->student_List = $student_info;
        $this->list_info = $list_info;
    }

    public function get_list($teacher)
    {
        //抓出符合老師的學生表
        return $this->student_List->get_teacher($teacher['teach_name'])->sortBy('stud_id');
    }

    public function get_change_list($teacher,$keyPoint)
    {
        $rows =$this->student_List->get_siga_list($teacher['teach_name'],$keyPoint);
        return $rows;
//        return $rows->filter(function($collect){
//            return preg_match($collect->A.$collect->B, 'keyword');
//
//        });

    }

    public function get_student_info($student)
    {
        //抓出學生表
        return $this->student_List->get_student($student);
    }

    public function get_student_id($teacher)
    {
        return $this->student_List->get_studentP_id($teacher);
    }
}


