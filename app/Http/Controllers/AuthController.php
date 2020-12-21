<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function getLogin()
    {
       return view('auth.login');
    }
    public function authenticate(Request $request)
    {  
        $valiDateData = $request->validate(
            [
              'email' => 'required',
              'password'=>'required||min:3|max:32',
            ],
            [  
               'email.required'  => 'Bạn chưa nhập email',
               'password.required' => 'Bạn chưa nhập mật khẩu',
               'password.max' => 'Mật khẩu phải có ít hơn 32 kí tự',
               'password.min' => 'Mật khẩu phải có nhiều hơn 3 kí tự',
              
            ]);
        if(Auth::attempt(['email' => $request->email, 'password' =>  $request->password , 'delete_status' => 1]))
        {
           return redirect()->route('getIndex');

        }
        else
        {
            return redirect()->route('login')->with('status','Đăng nhập thất bại !');

        }
    }
    public function logoutAuth()
    { 
        Auth::logout();
        return redirect("/");

    }
}
