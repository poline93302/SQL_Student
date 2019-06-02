<?php

namespace App\Repositories;

use App\Entities\Teacher;
use DB;

class teacherRepository
{
    protected $teacher;

    public function __construct()
    {
        $this->teacher =  new Teacher();
    }

    public function get_teacher($teacher_id)
    {
        return $this->teacher->where('teach_id',$teacher_id)->first();
    }
}