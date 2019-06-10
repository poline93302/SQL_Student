<?php

namespace App\Repositories;

use App\Entities\InterCor;
use Carbon\Carbon;
use DB;

class linkerRepository
{
    protected $inter_link_table;
    public function __construct(InterCor $inter_link_table)
    {
        $this->inter_link_table =  new $inter_link_table;
    }

    public function create_table($student,$teacher){
        $student_id = str_split($student,8);

        $this->inter_link_table->updateOrCreate(
            ['form_id'  => $student],
            [
                'teach_id' => $teacher,
                'stud_id'  => $student_id[0],
            ]
        );
    }

    public function get_stud_time(){
        $stud_count = $this->inter_link_table
            ->select('stud_id', DB::raw('count(*) as times'))
            ->groupBy('stud_id')
            ->get();
        return $stud_count;
    }

    public function get_stud_list_info($id){
        $stud_list = $this->inter_link_table
            ->where('stud_id',$id)
            ->orderBy('form_id','DESC')
            ->get();
        return $stud_list;
    }

    public function del_by_id_linker($id){
        $this->inter_link_table
            ->where('form_id',$id)
            ->delete();
    }
}