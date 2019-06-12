<?php

namespace App\Repositories;

use App\Entities\counterdate;
use DB;

class studentcounter
{
    protected $counterdate;
    public function __construct(counterdate $counterdate)
    {
        $this->counterdate = $counterdate;
    }

    public function get_counter()
    {
        $info =$this->counterdate->get();
        return $info;
    }
}