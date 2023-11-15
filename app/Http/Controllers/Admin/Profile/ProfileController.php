<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function viewProfile()
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.profile.profile')->with(compact('admin'));
    }

    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'name' => 'required'
        ]);

        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try{

            Admin::where('id', Auth::guard('admin')->user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            session()->flash('info', 'Profile Updated Successfully.');
            return redirect()->back();

        }catch(\Exception $ex){
            $validator->errors()->add('email', 'Sorry, unable to update profile, if problem persists please contact developers.');
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(['email'=>$request->email]);
        }

    }
}
