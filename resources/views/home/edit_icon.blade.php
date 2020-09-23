@extends('layouts.app_nofooter')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">

<div class="card">
  <div class="card-header d-flex justify-content-between">
    {{ __('アイコン変更') }}
    <a href="/home/edit"><button class="btn btn-danger">✖︎</button></a>
  </div>

  <div class="card-body">
    <div class="d-flex flex-wrap justify-content-between">



    <!-----------------------↓↓[normal icon]↓↓--------------------------->
    <form method="POST" action="/home/update/{{$user->id}}">
      @csrf

      <div class="text-center m-2" style="width:150px;">
        <div class="border mb-2">
          <img src="{{asset('img/icon_normal.png')}}" class="w-100 p-2">
        </div>
        <button type="submit" class="btn btn-primary">
          {{ __('変更する') }}
        </button>
      </div>

      <input type="hidden" name="icon_url" value="icon_normal.png">
    </form>



    <!-----------------------↓↓[girl icon]↓↓--------------------------->
    @if($user->unlock_icon_girl === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_girl.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_girl.png">
      </form>
    @endif



    <!-----------------------↓↓[salaryman icon]↓↓--------------------------->
    @if($user->unlock_icon_salaryman === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_salaryman.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_salaryman.png">
      </form>
    @endif



    <!-----------------------↓↓[salarywoman icon]↓↓--------------------------->
    @if($user->unlock_icon_salarywoman === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_salarywoman.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_salarywoman.png">
      </form>
    @endif



    <!-----------------------↓↓[sennnin icon]↓↓--------------------------->
    @if($user->unlock_icon_sennnin === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_sennnin.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_sennnin.png">
      </form>
    @endif



    <!-----------------------↓↓[shinpu icon]↓↓--------------------------->
    @if($user->unlock_icon_shinpu === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_shinpu.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_shinpu.png">
      </form>
    @endif



    <!-----------------------↓↓[student icon]↓↓--------------------------->
    @if($user->unlock_icon_student === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_student.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_student.png">
      </form>
    @endif



    <!-----------------------↓↓[queen icon]↓↓--------------------------->
    @if($user->unlock_icon_queen === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_queen.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_queen.png">
      </form>
    @endif



    <!-----------------------↓↓[fukusuke icon]↓↓--------------------------->
    @if($user->unlock_icon_fukusuke === 1)
      <form method="POST" action="/home/update/{{$user->id}}">
        @csrf

        <div class="text-center m-2" style="width:150px;">
          <div class="border mb-2">
            <img src="{{asset('img/icon_fukusuke.png')}}" class="w-100 p-2">
          </div>
          <button type="submit" class="btn btn-primary">
            {{ __('変更する') }}
          </button>
        </div>

        <input type="hidden" name="icon_url" value="icon_fukusuke.png">
      </form>
    @endif



    </div><!-- d-flex -->

    <!-----------------------↓↓[syopping url]↓↓--------------------------->
    <div class="col-12 m-2 border">
      <img src="{{asset('img/shopping_cart.png')}}" class="d-block p-2 mx-auto" style="width:150px;">
      <button class="btn btn-secondary btn-block d-block mx-auto m-2" onclick="location.href='/home/shop'">
        {{__('アイコンショップで新しいアイコンを入手')}}
      </button>
    </div>



  </div><!-- card body -->
</div>
</div>
</div>
</div>


@endsection
