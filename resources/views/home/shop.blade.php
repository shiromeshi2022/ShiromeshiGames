@extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">


<div class="card-header d-flex justify-content-between">
  {{ __('アイコンショップ') }}
  <a href="/home/edit_icon"><button class="btn btn-danger">✖︎</button></a>
</div>



<div class="card-body">
<div class="col-12 m-2 border">
  <img src="{{asset('img/shopping_cart.png')}}" class="d-block p-2 mx-auto" style="width:150px;">
</div>


<div class="d-flex flex-wrap justify-content-between">



<!-----------------------↓↓[girl icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(200)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_girl === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">200</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_girl.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_girl">
</form>



<!-----------------------↓↓[salaryman icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(500)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_salaryman === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">500</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_salaryman.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_salaryman">
</form>



<!-----------------------↓↓[salarywoman icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(1000)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_salarywoman === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">1000</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_salarywoman.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_salarywoman">
</form>



<!-----------------------↓↓[sennnin icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(1500)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_sennnin === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">1500</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_sennnin.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_sennnin">
</form>



<!-----------------------↓↓[shinpu icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(2000)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_shinpu === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">2000</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_shinpu.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_shinpu">
</form>



<!-----------------------↓↓[student icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(3000)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_student === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">3000</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_student.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_student">
</form>



<!-----------------------↓↓[queen icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(4000)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_queen === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">4000</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_queen.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_queen">
</form>



<!-----------------------↓↓[fukusuke icon]↓↓--------------------------->
<form method="POST" action="/home/update/{{$user->id}}" onSubmit="return check(5000)">
@csrf
  <div class="text-center m-2" style="width:150px;">

    @if($user->unlock_icon_fukusuke === 0)
      <div class="border mb-2">
        <img src="{{asset('img/key.png')}}" class="w-100 p-2">
      </div>
      <button type="submit" class="btn btn-outline-warning d-flex justify-content-center mx-auto">
        <h3 style="color:black;">5000</h3>
        <img src="{{asset('img/coin.png')}}" style="width:30px;height:30px;">
      </button>
    @else
      <div class="border mb-2">
        <img src="{{asset('img/icon_fukusuke.png')}}" class="w-100 p-2">
      </div>
      <div class="btn btn-secondary">
        {{ __('購入済') }}
      </div>
    @endif
  </div>
<input type="hidden" name="buy_icon" value="icon_fukusuke">
</form>



</div><!-- d-flex -->

<a href="/home/edit_icon" class="d-block w-100 my-3"><button class="btn btn-secondary w-100">アイコン変更画面へ</button></a>

</div><!-- cord-body -->



</div><!-- .card -->
</div><!-- .col-md-8 -->
</div><!-- .row justify-content-center -->
</div><!-- .container -->


@php
  $user_coins = $user->coins;
@endphp

<script>
  const user_coins = @json($user_coins);
</script>

<script type="text/javascript"> 
// 所持金不足チェック・最終確認機能
function check(required_coins){
  if(user_coins >= required_coins){//所持金が足りた時の処理
    if(window.confirm(required_coins + 'コインを使って本当に購入しますか？')){
      //購入を実施
      return true;
    }else{ // 「キャンセル」選択時の処理
      window.alert('キャンセルされました');
      //購入をキャンセル
      return false;
    }
  }else{
    alert('所持金が足りません');
    return false;
  }
}
</script>

@endsection
