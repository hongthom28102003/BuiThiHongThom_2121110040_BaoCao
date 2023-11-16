<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getlogin()
    {
        return view('backend.users.login');
    }

    public function postlogin(Request $request)
    {
        $username= $request->username;
        $password= $request->password;
        echo $username .''. $password;
        $data=array('password'=>$password, 'roles'=>1);
        if (filter_var($username, FILTER_VALIDATE_EMAIL)){
            $data['email']=$username;
        } else
        {
            $data['username']=$username;
        }

        var_dump($data);
        if(Auth::attempt($data)){
            return redirect()->route('admin.dashboard');
        }
        $error='Tài khoản đăng nhập không hợp lệ';
        return view('backend.users.login',compact('error'));
    }
    public function logout()
    {
        Auth::logout();
        echo "aaaaaaaaaaaaaa";
        return redirect()->route('admin.login');
    }

    
}
