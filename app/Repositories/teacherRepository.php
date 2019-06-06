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
}