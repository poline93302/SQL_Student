<?php

namespace App\Repositories;

use App\Entities\Inter;
use Carbon\Carbon;
use DB;

class interviewtableRepository
{
    protected $inter_table;

    public function __construct(Inter $inter_table)
    {
        $this->inter_table =  $inter_table;
    }

//    public function get_time($student){
//        $inter_time = $this->inter_table->where($student)->count();
//        dd($inter_time);
//        return $inter_time;
//    }

    public function get_context_table($form_id,$student,$check_info,$conclusion,$file)
    {
        $time = Carbon::now('Asia/Hong_Kong')->format('Y-m-d h:i:s');
        $this->inter_table -> updateOrCreate([
            'form_id' => $form_id,
        ],[
            'inter_time'   =>$time,
            'inter_file'   =>$file,
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

    public function get_table_info($id)
    {
        return ($this->inter_table->where('form_id',$id)->get());
    }

    public function del_by_id($id)
    {
        $this->inter_table->where('form_id',$id)->delete();
    }

    public function file_create($id,$filename)
    {
        $this->inter_table
            ->where('form_id',$id)
            ->update(['inter_file'=>$filename]);
    }

    public function item_info()
    {
        $info = $this->inter_table
                        ->where('form_cont_ste','true')
                        ->get();
        dd($info);
    }
}