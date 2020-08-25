<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class WebschoolController extends Controller
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
        return view('webschool/webschool_welcome', ['user' => $user]);
    }

    public function prefectures(Request $request)
    {
        $user = Auth::user();
        return view('webschool/prefectures', ['user' => $user, 'request' => $request]);
    }
    public function prefectures_record(Request $request, $id)
    {
        $user = User::find($id);
        $user->webschool_prefectures_record = $request->webschool_prefectures_record;
        $user->save();
        return redirect('webschool/prefectures');
    }
}