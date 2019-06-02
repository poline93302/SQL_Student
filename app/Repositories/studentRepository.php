<?php

namespace App\Repositories;

use App\Entities\Student;
use DB;

class studentRepository
{
    protected $student;

    public function __construct()
    {
        $this->student =  new Teacher();
    }
}