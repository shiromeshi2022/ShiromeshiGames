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
            public function calculate_record(Request $request, $id)
            {
                $user = User::find($id);
                $user->brain_calculate_record = $request->brain_calculate_record;
                $user->save();
                return redirect('brain/calculate');
            }


    // 順番ゲーム
    public function order(Request $request)
    {
        $user = Auth::user();
        $rankers = DB::table('users')
                ->orderby('brain_order_record','desc')
                ->select('name','brain_order_record')
                ->limit(3)
                ->get();

        return view('brain/order', ['user' => $user, 'request' => $request, 'rankers' => $rankers]);
    }
            public function order_record(Request $request, $id)
            {
                $user = User::find($id);
                $user->brain_order_record = $request->brain_order_record;
                $user->save();
                return redirect('brain/order');
            }

}
