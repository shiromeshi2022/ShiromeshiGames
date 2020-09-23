<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();   #ログインユーザー情報を取得します。
        return view('home/home', ['user' => $user]);
    }

    // ショップ
    public function shop()
    {
        $user = Auth::user();
        return view('home/shop', ['user' => $user]);
    }



    //ユーザー情報編集ページトップ
    public function edit()
    {
        $user = Auth::user();
        return view('home/edit', ['user' => $user]);
    }


    //ユーザーネーム変更ページ
    public function edit_name()
    {
        $user = Auth::user();
        return view('home/edit_name', ['user' => $user]);
    }

    //パスワード変更ページ
    public function edit_password()
    {
        $user = Auth::user();
        return view('home/edit_password', ['user' => $user]);
    }

    //アイコン変更ページ
    public function edit_icon()
    {
        $user = Auth::user();
        return view('home/edit_icon', ['user' => $user]);
    }

    //変更form送信先
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        //名前変更
        if(!empty($request->name)){
            $user->name = $request->name;
        }
        //パスワード変更
        if(!empty($request->password)){
            $user->password = bcrypt($request->password);
        }
        //アイコン変更
        if(!empty($request->icon_url)){
            $user->icon_url = $request->icon_url;
        }
        //アイコン購入
        if(!empty($request->buy_icon)){
            // if($request->buy_icon === "icon_girl"){
            //     $user->unlock_icon_girl = 1;

            // }
            switch ($request->buy_icon) {
                case "icon_girl":
                    $user->unlock_icon_girl = 1;
                    $user->coins -= 200;
                    $user->save();
                    return redirect('/home/shop');
                    break;
                case 'icon_salaryman':
                    $user->unlock_icon_salaryman = 1;
                    $user->coins -= 500;
                    $user->save();
                    return redirect('/home/shop');
                    break;
                case 'icon_salarywoman':
                    $user->unlock_icon_salarywoman = 1;
                    $user->coins -= 1000;
                    $user->save();
                    return redirect('/home/shop');
                    break;
                case 'icon_sennnin':
                    $user->unlock_icon_sennnin = 1;
                    $user->coins -= 1500;
                    $user->save();
                    return redirect('/home/shop');
                    break;
                case 'icon_shinpu':
                    $user->unlock_icon_shinpu = 1;
                    $user->coins -= 2000;
                    $user->save();
                    return redirect('/home/shop');
                    break;
                case 'icon_student':
                    $user->unlock_icon_student = 1;
                    $user->coins -= 3000;
                    $user->save();
                    return redirect('/home/shop');
                    break;
                case 'icon_queen':
                    $user->unlock_icon_queen = 1;
                    $user->coins -= 4000;
                    $user->save();
                    return redirect('/home/shop');
                    break;
                case 'icon_fukusuke':
                    $user->unlock_icon_fukusuke = 1;
                    $user->coins -= 5000;
                    $user->save();
                    return redirect('/home/shop');
                    break;
            }
        }


        $user->save();
        return redirect('/home');
    }

    //ユーザー削除
    public function destroy($id){
        $user = User::find($id);
        $user->delete();
        return redirect('/');
    }
}
