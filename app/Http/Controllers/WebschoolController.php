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

    //県庁所在地ゲーム
    public function prefectures(Request $request)
    {
        $user = Auth::user();
        return view('webschool/prefectures', ['user' => $user, 'request' => $request]);
    }

    //県庁所在地ゲーム点数記録
    public function prefectures_record(Request $request, $id)
    {
        $user = User::find($id);
        if($request->score > $user->webschool_prefectures_record){
            $user->webschool_prefectures_record = $request->score;
        }
        if($request->score > 0){
            $user->coins = $user->coins + $request->score;
        }
        $user->save();
    }
}