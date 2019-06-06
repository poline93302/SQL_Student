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

}


