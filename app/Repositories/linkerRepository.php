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
        $form_id = $student.Carbon::now()->format('Ymdhis');
        $this->inter_link_table->create([
            'teach_id' => $teacher,
            'stud_id'  => $student,
            'form_id'  => $form_id,
        ]);
    }

    public function get_stud_time(){
        $stud_count = $this->inter_link_table
            ->select('stud_id', DB::raw('count(*) as times'))
            ->groupBy('stud_id')
            ->get();
        return $stud_count;
    }
}