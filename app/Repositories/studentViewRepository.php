<?php

namespace App\Repositories;

use App\Entities\StudentView;
use DB;

class studentViewRepository
{
    protected $student;

    public function __construct()
    {
        $this->student =  new StudentView();
    }
    public function get_teacher($teacher_name)
    {
        //取出所有資料
        return $this->student->where('teach_name',$teacher_name)->get();
    }

    public function get_siga_list($teacher_name,$keyPoint)
    {
        if(is_null($keyPoint)){
            $list = $this->student->where('teach_name',$teacher_name)->get();
        }else if(mb_strlen($keyPoint, mb_detect_encoding($keyPoint)) == strlen($keyPoint)){
            $list = $this->student->where('stud_id','like',$keyPoint.'%')
                ->where('teach_name',$teacher_name)->get();
        }else{
            $list = $this->student->where('stud_name','like',$keyPoint.'%')
                ->where('teach_name',$teacher_name)->get();
        }
        return $list;
    }

    public function get_student_id($teacher_name)
    {
        dd($this->student->where('teach_name',$teacher_name)->get());
//        return $this->student->where('stud_id',$teacher_name)->first();
    }
    public function get_student($teacher_name)
    {
        dd($this->student->where('teach_name',$teacher_name)->get());
//        return $this->student->where('stud_id',$teacher_name)->first();
    }
}