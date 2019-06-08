<?php

namespace App\Services;
use App\Repositories\interviewtableRepository;
use App\Repositories\linkerRepository;
use Illuminate\Support\Facades\Auth;

class interviewtableService
{
    protected $inter_table;
    protected $linker;

    public function __construct(interviewtableRepository $inter_table , linkerRepository $linker)
    {
        $this->inter_table = $inter_table;
        $this->linker      = $linker;
    }

    public function create_context_table($student,$check_info,$conclusion,$file){
        $this->inter_table->get_context_table($student,$check_info,$conclusion,$file);
    }

    public function count_linker(){
        $show = $this->linker->get_stud_time();
//        dd($show);
        return $show ;
    }
}


