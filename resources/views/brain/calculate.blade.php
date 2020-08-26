@extends('layouts.app')



<head>
  <link rel="stylesheet" href="{{asset('/css/brain_calculate.css')}}">
</head>
<!---------------------------------------------------------------------------------------------------->
@section('content')
<div class="container">


<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">ホーム</a></li>
    <li class="breadcrumb-item"><a href="{{ route('brain.welcome') }}">脳トレラボ</a></li>
    <li class="breadcrumb-item active" aria-current="page">電卓ノウトレ</li>
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
        if($above_score == $ranker->brain_calculate_record){
          /** <!-- 前順位者と同じ点→順位をそのまま --> */
        }else{
          /** <!-- 前順位者より点が低い→順位を１増やす --> */
          $rank++;
        }
      }
      $above_score = $ranker->brain_calculate_record;
    @endphp

    <!-- rankerのnameとrecordを表示 -->
    <div class="col-lg-4 col-12 mr-2 mb-2 border shadow rounded">
      <h4>{{$rank}}位</h4>
      <div class="d-flex flex-row justify-content-around">
        <h4 class="font-weight-bold">{{$ranker->name}}</h4>
        <h4 class="text-info font-weight-bold">{{$ranker->brain_calculate_record}}点</h4>
      </div>
    </div>
  @endforeach
</div>


<!---------------------------------------↓↓[main]↓↓--------------------------------------------->
<section class="main container shadow-lg p-3 mb-5 bg-white rounded">

<!-- ルール説明 -->
<fieldset class="rule">
  <legend>ルール説明</legend>
  <p>電卓を使って脳トレをしよう！黄色のゾーンに１〜１００の数字が出るので、足し算をしてその答えと同じにしてください。<br>
  1ケタか、２ケタまで入力できます。<br>
  打ち直したいときや、やり直したい時は下の<button type="button" class="btn btn-outline-danger">赤いボタン</button>をクリックしてください。</p>
  制限時間1分の間に、できるだけ多くの数字を計算してください！<br>
  <button type="button" class="btn btn-primary m-2">スタート</button>でゲームスタートです
  <ul>
    <li>正解 <span style="color:blue;">+10点</span></li>
    <li>不正解 <span style="color:red;">-10点</span></li>
    <li>掛け算、割り算 <span style="color:blue;">ボーナス +5点</span></li>
    <li>0を使った計算（1つにつき） <span style="color:red;">減点 -5点</span></li>
    <li>1を使った計算（1つにつき） <span style="color:red;">減点 -5点</span></li>
  </ul>
  <p>掛け算、割り算や、0と1を使わない難しい計算をたくさんすると得点が高くなります！</p>
</fieldset>

<!-----------------------↓↓[game]↓↓--------------------------->
<div class="game">

<!--  -->
<div class="game-nav d-md-flex flex-row">
  <p id="questionTurn" class="mx-3">１問目</p>
  <p id="timerLabel" class="mx-3"></p>
  <div style="position: relative;" class="mx-3">
    <p id="scoreLabel">0点</p>
    <h2 id="addedScoreLabel" class="d-none">+10点</h3>
  </div>
</div>

<div class="questionLabel" id="questionLabel"></div>

  <!-- 電卓 -->
  <div class="pad">

    <!-- ユーザーが入力した数字を表示 -->
    <div id="calculationScreen" class="calculationScreen">
    </div>

    <div class="numbers">
      <div class="number" id="sevenBtn">7</div>      
      <div class="number" id="eightBtn">8</div>      
      <div class="number" id="nineBtn">9</div>
      <div class="number" id="divideBtn">÷</div>    
      <div class="number" id="fourBtn">4</div>      
      <div class="number" id="fiveBtn">5</div>      
      <div class="number" id="sixBtn">6</div> 
      <div class="number" id="multipleBtn">×</div>     
      <div class="number" id="oneBtn">1</div>      
      <div class="number" id="twoBtn">2</div>      
      <div class="number" id="threeBtn">3</div>
      <div class="number" id="subtractBtn">-</div>
      <div class="number" id="zeroBtn">0</div>  
      <div class="number" id="addBtn">+</div>  
      <div class="number" id="equalBtn">=</div>  
    </div>


    <!-- スタートウィンドウ -->
    <div id="startWindow" class="startWindow card w-100 shadow rounded">
      <div class="card-header">
        電卓ノウトレ
      </div>
      <div class="card-body">
        <h5 class="card-title">制限時間60秒</h5>
        <p class="card-text">
          <span style="background: #f0e68c;
            border-radius: 5px;
            border: 2px dashed gray;
          ">　　　</span>に問題が表示されます
        </p>
        <button type="button" class="btn btn-primary w-50" id="startBtn">スタート</button>
      </div>
    </div>

    <!-- リザルトウィンドウ -->
    <div id="resultWindow" class="d-none card w-100 shadow rounded" style="position: absolute;top:0;">
      <div class="card-header">
        結果
      </div>

      <div class="card-body">

        <h2 class="card-title font-weight-bold" id="resultScore"></h2>
        <p class="card-text" id="resultCorrect"></p>
        <p class="card-text" id="resultMiss"></p>

        <div style="font-size:15px">
          @auth
            @php
              $recordScore = $user->brain_calculate_record;
            @endphp
            <div>
              <p id="showRecordLabel">{{$user->name}}さんの最高点 : {{$recordScore}}</p>
              <p id="informRecordLabel" class="alert alert-success d-none">最高得点更新しました！</p>
              <form id="sendRecordForm" method="POST" action="{{ url('brain/calculate_record/'.$user->id) }}">
                @csrf
                <input id="sendRecordInput" type="hidden" name="brain_calculate_record">
                <input id="sendRecordBtn" type="submit" value="記録する" class="btn btn-outline-primary w-50 d-none"></input>
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

        <button type="button" class="btn btn-primary w-50" id="restartBtn">もう一度プレイ</button>

      </div>
    </div>
    <!-- resultWindow -->
  </div>
  <!-- pad -->


  <!-- 赤いボタン(リセット、リプレイボタン) -->
  <div class="special">
    <button type="button" class="btn btn-outline-danger" id="deleteBtn">電卓を打ち直す</button>
    <button type="button" class="btn btn-outline-danger" id="reloadBtn">ゲームをやり直す</button>
  </div>


</div>
<!-- game -->
</section>
<!-- main -->
</div>
<!-- .container -->


<!-- userデータをphpからjsへ渡す -->
@auth
  @php
    $recordScore = $user->brain_calculate_record;
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


<script src="{{asset('/js/brain_calculate.js')}}"></script>

@endsection