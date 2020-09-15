@extends('layouts.app')

<head>
  <link rel="stylesheet" href="{{asset('/css/brain_order.css')}}">
</head>

<!---------------------------------------------------------------------------------------------------->
@section('content')
<div class="container">


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">ホーム</a></li>
    <li class="breadcrumb-item"><a href="{{ route('brain.welcome') }}">脳トレラボ</a></li>
    <li class="breadcrumb-item active" aria-current="page">順番ゲーム</li>
  </ol>
</nav>



<h2 class="mt-5">ユーザーランキング</h2>
<div class="d-lg-flex flex-row w-100">
  @php
    $rank = 1;
  @endphp
  <!-- ranker_dataをcontrollerから取得 & （前と比べて同じなら順位を変えない） -->
  @foreach($rankers as $ranker)
    @php

      /** <!--２位以降の処理（１位は除外）--> */
      if(!empty($above_score)){
        if($above_score == $ranker->brain_order_record){
          /** <!-- 前順位者と同じ点→順位をそのまま --> */
        }else{
          /** <!-- 前順位者より点が低い→順位を１増やす --> */
          $rank++;
        }
      }
      $above_score = $ranker->brain_order_record;
    @endphp

    <!-- rankerのnameとrecordを表示 -->
    <div class="col-lg-4 col-12 mr-2 mb-2 border shadow rounded">
      <h4>{{$rank}}位</h4>
      <div class="d-flex flex-row justify-content-around">
        <h4 class="font-weight-bold">{{$ranker->name}}</h4>
        <h4 class="text-info font-weight-bold">{{$ranker->brain_order_record}}点</h4>
      </div>
    </div>
  @endforeach
</div>


<section class="main container shadow-lg p-3 mb-5 bg-white rounded">

  <!--------↓[ルール]↓----------->
  <fieldset class="rule container col-lg-8 col-12">
    <legend>ルール説明</legend>
    都道府県庁所在地のクイズです。<br>
    全47問あります。<br>
    〇〇県の県庁所在地は？と聞かれるので３つの選択肢から答えを選んでください。<br>
    解いた問題は解説を読んで学習しましょう。<br>
    気になった県や市は調べてみると学習効果が高いです。
  </fieldset>

  <!-----------------------↓↓[game]↓↓--------------------------->
  <div class="container border border-dark rounded col-lg-8 col-12 my-5">

    <!--------↓[startSection]↓----------->
    <section id="startSection">
      <div class="w-100 h-50 d-flex flex-column justify-content-center align-items-center">
        <div class="h2">順番ノウトレ</div>
        <button id="startBtn" type="button" class="btn btn-primary d-block">スタート</button>
      </div>
    </section>

    <!--------↓[countDownSection]↓----------->
    <section id="countDownSection" class="d-none">
      <div class="w-100 h-50 d-flex flex-column justify-content-center align-items-center">
        <p id="countDownLabel" class="display-4 font-weight-bold text-center my-auto">3</p>
      </div>
    </section>

    <!--------↓[playSection]↓----------->
    <section id="playSection" class="d-none">
      <div class="d-md-flex flex-row w-100 h-auto">

        <div class="d-flex flex-column justify-content-center align-items-center"> 
            <h2 id="timerLabel">制限時間 60:00</h2>
            <h2 id="scoreLabel">100点</h2>
        </div>

        <div id="numberPlatesZone" class="d-flex flex-row flex-wrap m-auto bg-light" style="width: 280px;">
          <!-- シャッフルされたナンバープレートが追加される -->
        </div>

      </div>
    </section>

    <!--------↓[resultSection]↓----------->
    <section id="resultSection" class="d-none">
      <p></p>
      <div id="userRecord" style="font-size:15px">
        @auth
          @php
            $recordScore = $user->brain_order_record;
          @endphp
          <div>
            <p id="showRecord">{{$user->name}}さんの最高点 : {{$recordScore}}</p>
            <p id="informRecord" class="alert alert-success d-none">最高得点更新しました！</p>
            <form method="POST" action="{{ url('brain/order_record/'.$user->id) }}" id="sendRecord">
              @csrf
              <input type="hidden" name="brain_order_record" id="sendRecordInput">
              <input type="submit" value="記録する" id="sendRecordBtn" class="btn btn-outline-primary w-50 d-none"></input>
            </form>
          </div>
        @else
          <a href="{{route('login') }}">
            @php
              echo  'ユーザー登録すると得点が記録できます';
            @endphp
          </a>
        @endauth
      </div>
      <button id="restartBtn" class="btn btn-success">もう一度</button>
    </section>
  </div>
  <!-- game -->
</section>
<!-- main -->
</div>
<!-- .container -->



<!-- userデータをphpからjsへ渡す -->
@auth
  @php
    $recordScore = $user->brain_order_record;
  @endphp
  <script>
    let isUser = true;
    const recordScore = @json($recordScore);
  </script>
@else
  <script>
    let isUser = false;
  </script>
@endauth


<script src="{{asset('/js/brain_order.js')}}"></script>

@endsection