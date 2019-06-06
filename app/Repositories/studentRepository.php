<?php

namespace App\Repositories;

use App\Entities\Student;
use DB;

class studentRepository
{
    protected $student;

    public function __construct()
    {
        $this->student =  new Student();
    }
    public function get_teacher($teacher_name)
    {
        //取出所有資料
        $student_lists = $this->student->where('teach_name',$teacher_name)->get();
        return $student_lists;
    }
}