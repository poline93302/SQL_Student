<?php

namespace App\Services;
use App\Repositories\linkerRepository;
use Illuminate\Support\Facades\Auth;

class teacstudinterService
{
    protected $inter_context_table;

    public function __construct(linkerRepository $inter_context_table)
    {
        $this->inter_context_table = $inter_context_table;
    }

    public function create_link_table($student_id,$teacher){
        $this->inter_context_table->create_table($student_id,$teacher);
    }
}


