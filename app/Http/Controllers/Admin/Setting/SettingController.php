<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    //
    public function viewSetting()
    {
        return view('admin.setting.setting');
    }

    public function updatePassword(Request $request)
    {
        $messages = [
            'existing_password.required' => __('Please enter current password'),
            'password.required'          => __('Please enter new password'),
        ];

        $validator = Validator::make($request->all(), [
            'existing_password' => 'required',
            'password'          => 'required|min:8|confirmed',
        ], $messages);

        // Ensure that user's password matches password from the form
        $validator->after(function ($validator) use ($request) {
            $existing_password = Auth('admin')->user()->password;
            if (!Hash::check($request['existing_password'], $existing_password)) {
                $validator->errors()->add('existing_password', __('Your current password does not match with the password you provided'));
            }
        });

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = Auth('admin')->user();
        $admin->password = Hash::make($request['password']);

        $admin->update();

        session()->flash('info', 'Password successfully changed.');
        return redirect()->back();
    }
}
