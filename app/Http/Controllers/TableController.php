<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\teacherService;

class TableController extends Controller
{
    public function index()
    {
//        dd("123");
        return view('page.interViewTable');
    }

    public function EditList()
    {
        dd('Edit');
    }
}
