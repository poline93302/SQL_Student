<?php

namespace App\Repositories;

use App\Entities\Teacher;
use DB;

class tableListRepository
{
    protected $teacher;

    public function __construct()
    {
        $this->teacher =  new Teacher();
    }

    public function get_teacher($id,$passwd)
    {
        $data=[
             $user      = $this->teacher->where('teach_id',$id)->get(),
             $user_pass = $this->teacher->where('teach_password',$passwd)->get()
        ];

//        dd($data);
        return $data;
    }
}