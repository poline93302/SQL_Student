<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\interviewtableService;

class ToneController extends Controller
{
    protected $inter_info;
    public function __construct(interviewtableService $inter_info)
    {
        $this->inter_info = $inter_info;
    }
    public function index()
    {
        return view('page.tuton');
    }

    public function getInfo()
    {
        $data=[
            'info' =>$this->inter_info->get_item_info(),
        ];
        echo collect($data)->toJson();
    }

    public function getCount()
    {
        $data=[
            'inter_info'=> $this->inter_info->get_count_info(),
        ];
        echo collect($data)->toJson();
    }
}
