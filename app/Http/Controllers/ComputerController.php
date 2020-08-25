<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class ComputerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function welcome()
    {
        $user = Auth::user();
        return view('computer/computer_welcome', ['user' => $user]);
    }

    public function typing()
    {
        $user = Auth::user();
        $rankers = DB::table('users')
                ->orderby('computer_typing_record','desc')
                ->select('name','computer_typing_record')
                ->limit(3)
                ->get();
        return view('computer/typing', ['user' => $user, 'rankers' => $rankers]);
    }
    public function typing_record(Request $request, $id)
    {
        $user = User::find($id);
        $user->computer_typing_record = $request->computer_typing_record;
        $user->save();
        return redirect('computer/typing');
    }

    public function hiyokotyping()
    {
        $user = Auth::user();
        $rankers = DB::table('users')
                ->orderby('computer_hiyokotyping_record','desc')
                ->select('name','computer_hiyokotyping_record')
                ->limit(3)
                ->get();
        return view('computer/hiyokotyping', ['user' => $user, 'rankers' => $rankers]);
    }
    public function hiyokotyping_record(Request $request, $id)
    {
        $user = User::find($id);
        $user->computer_hiyokotyping_record = $request->computer_hiyokotyping_record;
        $user->save();
        return redirect('computer/hiyokotyping');
    }
}
