<?php

namespace App\Http\Controllers;

use App\Services\teacherService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class homeController extends Controller
{
    protected $teacher_Info;

    public function __construct(teacherService $teacher_Info)
    {
        $this->teacher_Info = $teacher_Info;
    }

    public function index(){
        return view('page.login');
    }
    public function postLogin(Request $request){
        $user = $this->teacher_Info->check($request->input('teach_id'),$request->input('teach_password'));

        if(!is_null($user)){
            Auth::login($user);
            Session::put('teach_id',$user->teach_id);
            Session::put('teach_class',$user->teach_class);
            return redirect('/'.($user->teach_id));
        }else{
            echo "<script> alert('輸入帳號密碼不存在') </script>";
            return redirect('login');
        }
//

    }

    public function showInfo($teacher_info)
    {
        $data=[

        ];
        return view('page.listPage',$data);
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
    public function registered()
    {
    ;
    }
}
