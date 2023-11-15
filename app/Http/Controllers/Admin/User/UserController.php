<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Exam;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.user.index')->with(compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        try{

            $no_image = 'default.png';

            if($request->hasFile('image')){
                $image_original_name = $request->file('image')->getClientOriginalName();
                $image_original_name = Str::slug($image_original_name.'-'.time());
                $path = $request->file('image')->storeAs('/users/', $image_original_name, ['disk' => 'public']);
                $image_name = basename($path);
            }

            if($request->hasFile('file')){
                $file_original_name = $request->file('file')->getClientOriginalName();
                $file_original_name = Str::slug($file_original_name.'-'.time());
                $path = $request->file('file')->storeAs('/files/', $file_original_name, ['disk' => 'public']);
                $file_name = basename($path);
            }

            $user = new User();
            $user->name = $request->name;
            $user->first_name = $request->first_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->candidate_number = $request->candidate_number;
            $user->date_of_entry = $request->date_of_entry;
            $user->code = $request->code;
            $user->password = Hash::make('password');
            $user->image = $image_name;
            $user->file = $file_name ?: $no_image;
            $user->save();

            session()->flash('success', 'User Added Successfully.');
            return redirect()->route('admin.users.index');

        }catch(\Exception $ex){
            session()->flash('error', 'Error adding user, possible internet Error. If problem persists, please contact Developers.');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::where('id', $id)->first();
        return view('admin.user.show')->with(compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::where('id', $id)->first();
        return view('admin.user.edit')->with(compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        try{

            $user = User::findOrFail($id);
            $user_image_name = $user->image;

            if($request->hasFile('image')){
                if($user_image_name != "default.png"){
                    $path = storage_path() . '/app/public/users/'.$user_image_name;
                    try{
                        unlink($path);
                    }catch(\Exception $ex){
                    }
                }

                $image_original_name = $request->file('image')->getClientOriginalName();
                $path = $request->file('image')->storeAs('/users/', $image_original_name, ['disk' => 'public']);
                $user_image_name = basename($path);
            }

            $exam = Exam::findOrFail($id);
            $exam_file_name = $exam->file;

            if($request->hasFile('file')){
                if($exam_file_name != "default.png"){
                    $path = storage_path() . '/app/public/files/'.$exam_file_name;
                    try{
                        unlink($path);
                    }catch(\Exception $ex){
                    }
                }

                $file_original_name = $request->file('file')->getClientOriginalName();
                $path = $request->file('file')->storeAs('/files/', $file_original_name, ['disk' => 'public']);
                $exam_file_name = basename($path);
            }

            User::where('id', $id)->update([
                'name' => $request->name,
                'first_name' => $request->first_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'candidate_number' => $request->candidate_number,
                'date_of_entry' => $request->date_of_entry,
                'code' => $request->code,
                'image' => $user_image_name,
                'file' => $exam_file_name
            ]);

            session()->flash('info', 'User Updated Successfully');
            return redirect()->route('admin.users.index');

        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update User, possible network error. If problem persists, please contact developers.');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id', $id)->first();
        try{
            $image = $user->image;
            if($image != "default.png"){
                $path = storage_path() . '/app/public/users/'.$image;
                try{
                    unlink($path);
                }catch(\Exception $ex){
                }
            }

            $user->delete();

            session()->flash('info', 'User Deleted Successfully.');
            return redirect()->back();

        }catch(\Exception $ex){
            session()->flash('error', 'Unable to Delete User. if problem persists please contact developers.');
            return redirect()->back();
        }
    }

}
