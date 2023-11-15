<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //
    public function showLoginForm()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        //Validate User Inputs
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $adminCredentials = [
            'email' => $request->email,
            'password' => $request->password
        ];


        if (auth()->guard('admin')->attempt($adminCredentials)) {
            session()->flash('info', 'Welcome '.Auth::guard('admin')->user()->name.' !!!');
            return redirect()->route('admin.dashboard');
        }

        $validator->errors()->add('email', 'Sorry, Email or Password is Invalid, if problem persists please contact developers.');
        return redirect()->back()
            ->withErrors($validator)
            ->withInput(['email'=>$request->email, 'password'=>$request->password]);
    }

    public function logout(Request $request) {
        Auth('admin')->logout();
        session()->flash('info', 'You are now logged out !!!');
        return redirect()->route('admin.login.form');
    }
}
