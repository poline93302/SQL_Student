<?php

namespace App\Repositories;

use App\Entities\Inter;
use Carbon\Carbon;
use DB;

class interviewtableRepository
{
    protected $inter_table;

    public function __construct()
    {
        $this->inter_table =  new Inter();
    }

//    public function get_time($student){
//        $inter_time = $this->inter_table->where($student)->count();
//        dd($inter_time);
//        return $inter_time;
//    }

    public function get_context_table($student,$check_info,$conclusion,$file)
    {
        $form_id = $student.Carbon::now()->format('Ymdhis');
        $time = Carbon::now()->format('Y-m-d h:i:s');

        Inter::create([
            'form_id' => $form_id,
            'inter_time'=>$time,
            'inter_file'=>$file,
            'form_item_res'=>$check_info[0],
            'form_item_ass'=>$check_info[1],
            'form_item_fam'=>$check_info[2],
            'form_item_emo'=>$check_info[3],
            'form_item_sub'=>$check_info[4],
            'form_item_car'=>$check_info[5],
            'form_item_phy'=>$check_info[6],
            'form_item_oth'=>$check_info[7],
            'form_cont_ste'=>$conclusion[0],
            'form_cont_hep'=>$conclusion[1],
            'form_cont_oth'=>$conclusion[2],
        ]);
    }
}