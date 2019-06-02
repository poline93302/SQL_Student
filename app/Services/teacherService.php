<?php

namespace App\Services;
use App\Repositories\teacherRepository;
use Illuminate\Support\Facades\Auth;

class teacherService
{
    protected $teacher_info;

    public function __construct(teacherRepository $teacher_info)
    {
        $this->teacher_info = $teacher_info;
    }

    /**
     * @return checklogin
     */
    public function check($id,$passwd)
    {
        $checkName = $this->teacher_info->get_teacher($id);
        if(!is_null($checkName)){
            return $checkName;
        }
        return null;    //不存在
    }
}


