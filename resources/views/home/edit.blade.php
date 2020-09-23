@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    {{ __('ユーザー情報') }}
                    <a href="/home"><button class="btn btn-danger">✖︎</button></a>
                </div>

                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <h6>ユーザーネーム</h6>
                            <h3 class="text-center">{{$user->name}}</h3>
                            <a href="/home/edit_name"><button class="btn btn-secondary col-lg-2 col-md-3 col-4 offset-md-10 offset-9">編集する</button></a>
                        </li>

                        <li class="list-group-item">
                            <h6>パスワード</h6>
                            <h3 class="text-center">********</h3>
                            <a href="/home/edit_password"><button class="btn btn-secondary col-lg-2 col-md-3 col-4 offset-md-10 offset-9">編集する</button></a>
                        </li>

                        <li class="list-group-item">
                            <h6>アイコン画像</h6>
                            <div class="text-center">
                                <img class="icon border border-secondary rounded-circle m-3 p-2" src="{{asset('img/'.$user->icon_url)}}" style="width:100px;">
                            </div>
                            <a href="/home/edit_icon"><button class="btn btn-secondary col-lg-2 col-md-3 col-4 offset-md-10 offset-9">編集する</button></a>
                        </li>
                    </ul>

                    <hr>

                    <form method="POST" action="/home/destroy/{{$user->id}}" class="mb-5" onSubmit="return check()">
                        @csrf
                        <div class="text-right">
                            <button type="submit" class="btn btn-danger" >
                                {{ __('ユーザーを削除する') }}
                            </button>
                        </div>
                    </form>



                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript"> 
function check(){//ユーザー削除時の確認アラーム
	if(window.confirm('本当に削除してよろしいですか？')){
		return true; // 「OK」時は送信を実行
	}
	else{ // 「キャンセル」時の処理
		window.alert('キャンセルされました'); // 警告ダイアログを表示
		return false; // 送信を中止
	}
}
</script>

@endsection
