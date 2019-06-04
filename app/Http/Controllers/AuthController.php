<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\teacherService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    protected $teacherServer;
    protected $redirectTo = '{{route("loginSuccess")}}';

    public function __construct(teacherService $user)
    {
        $this->teacherServer = $user;
    }

    public function username()
    {
        return 'teach_id';
    }


    public function login(Request $request)
    {
        $userCheck =Auth::attempt(['teach_id'=>$request->input('teach_id'),'password'=>$request->input('teach_password')]);
        if($userCheck){
//            echo  "<script> alert('success')</script>";
            return redirect()->to(route('loginSuccess'));
        }else{
            echo  "<script> alert('error')</script>";
            return redirect('/login');
        }

    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
    }
}
