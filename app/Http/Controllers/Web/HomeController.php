<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class HomeController extends Controller
{
    //

    public function welcome()
    {
        return view('welcome');
    }

    public function showVerifyInfoForm()
    {
        return view('web.verify-info');
    }

    public function showResult(Request $request)
    {
        try{
            // dd($request->date);
            // dd(Carbon::createFromFormat('d/m/Y', $request->date)->format('Y-m-d'));
            $theDate = Carbon::parse($request->date)->format('Y-m-d');

            $user = User::where('code', $request->code)->where('date_of_entry', $theDate)->first();
            if($user){
                return view('web.verify-result')->with(compact('user'));
            }else{
                abort(404);
            }

        }catch(\Exception $ex){
            abort(500);
        }

    }

    public function print($userId)
    {
        $user = User::where('id', $userId)->first();
        $pdf = PDF::loadView('web.print-result', compact('user'));
        $userName = $user->name;
        return $pdf->download('aomething.pdf');
    }


}
