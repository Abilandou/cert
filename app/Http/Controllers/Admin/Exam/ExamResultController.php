<?php

namespace App\Http\Controllers\Admin\Exam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Support\Str;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $exams = Exam::orderBy('id', 'DESC')->get();
        return view('admin.exam.index')->with(compact('exams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::orderBy('id', "DESC")->get();
        return view('admin.exam.create')->with(compact('users'));
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

            $exam = new Exam();
            $exam->user_id = $request->user_id;
            $exam->test = $request->test;
            $exam->score = $request->score;
            $exam->level = $request->level;
            $exam->save();

            session()->flash('success', 'Exam Added Successfully.');
            return redirect()->route('admin.exams.index');

        }catch(\Exception $ex){
            session()->flash('error', 'Error adding exam, possible internet Error. If problem persists, please contact Developers.');
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
        $exam = Exam::where('id', $id)->first();
        $user = User::where('id', $id)->first();
        return view('admin.exam.show')->with(compact('exam', 'user'));
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
        $exam = Exam::where('id', $id)->first();
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.exam.edit')->with(compact('users', 'exam'));
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




            Exam::where('id', $id)->update([
                'user_id' => $request->user_id,
                'test' => $request->test,
                'score' => $request->score,
                'level' => $request->level
            ]);

            session()->flash('info', 'Exam Updated Successfully');
            return redirect()->route('admin.exams.index');

        }catch(\Exception $ex){
            session()->flash('error', 'Unable to update Exam, possible network error. If problem persists, please contact developers.');
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
        //
        $exam = Exam::where('id', $id)->first();
        try{
            $exam->delete();

            session()->flash('info', 'Exam Deleted Successfully.');
            return redirect()->back();

        }catch(\Exception $ex){
            session()->flash('error', 'Unable to Delete Exam. if problem persists please contact developers.');
            return redirect()->back();
        }
    }
}
