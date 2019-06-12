<?php

namespace App\Services;
use App\Repositories\interviewtableRepository;
use App\Repositories\linkerRepository;
use App\Repositories\studentcounter;
use App\Repositories\studentres;
use Illuminate\Support\Facades\Auth;

class interviewtableService
{
    protected $inter_table;
    protected $linker;
    protected $stuRes;
    protected $counterdate;

    public function __construct(interviewtableRepository $inter_table , linkerRepository $linker,studentres $stuRes,studentcounter $counterdate)
    {
        $this->inter_table = $inter_table;
        $this->linker      = $linker;
        $this->stuRes = $stuRes;
        $this->counterdate = $counterdate;
    }

    public function create_context_table($form_id,$student,$check_info,$conclusion,$file){
        $this->inter_table->get_context_table($form_id,$student,$check_info,$conclusion,$file);
    }

    public function take_form_id_info($id)
    {
        $info = $this->inter_table->get_table_info($id);
        return $info;
    }

    public function del_id_form($id){
        $this->inter_table->del_by_id($id);
        $this->linker->del_by_id_linker($id);
    }

    public function get_item_info()
    {
        return $this->stuRes->get_res_info();
    }

    public function get_count_info()
    {
        return $this->counterdate->get_counter();
    }
}


