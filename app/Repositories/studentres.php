<?php

namespace App\Repositories;

use App\Entities\concluding;
use DB;

class studentres
{
    protected $concluding_stu;
    public function __construct(concluding $concluding_stu)
    {
        $this->concluding_stu = $concluding_stu;
    }

    public function get_res_info(){
       $info =  $this->concluding_stu
                        ->where('form_cont_ste','true')
                        ->orWhere('form_cont_hep','true')
                        ->orwhere('form_cont_oth','<>',"")
                        ->get();
       return ($info);
    }
}