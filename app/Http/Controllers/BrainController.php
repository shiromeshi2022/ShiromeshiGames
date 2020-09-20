<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class BrainController extends Controller
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
        return view('brain/brain_welcome', ['user' => $user]);
    }

    // 電卓ノウトレ
    public function calculate(Request $request)
    {
        $user = Auth::user();
        $rankers = DB::table('users')
                ->orderby('brain_calculate_record','desc')
                ->select('name','brain_calculate_record')
                ->limit(3)
                ->get();

        return view('brain/calculate', ['user' => $user, 'request' => $request, 'rankers' => $rankers]);
    }

    //電卓脳トレ点数記録
    public function calculate_record(Request $request, $id)
    {
        $user = User::find($id);
        if($request->score > $user->brain_calculate_record){
            $user->brain_calculate_record = $request->score;
        }
        if($request->score > 0){
            $user->coins = $user->coins + $request->score;
        }
        $user->save();
    }


}
