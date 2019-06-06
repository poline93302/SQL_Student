<?php

namespace App\Services;
use App\Repositories\studentRepository;
use Illuminate\Support\Facades\Auth;

class studentService
{
    protected $student_List;

    public function __construct(studentRepository $student_List)
    {
        $this->student_List = $student_List;
    }

    public function get_list($info)
    {
        $incom =$this->student_List->get_teacher($info['teach_name'])->sortBy('stud_id');
        return $incom;
    }
}


