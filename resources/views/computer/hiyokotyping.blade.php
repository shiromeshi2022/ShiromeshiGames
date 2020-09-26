@extends('layouts.app')



<head>
  <!-- publicのファイル読み込み -->
  <link rel="stylesheet" href="{{asset('/css/computer_hiyokotyping.css')}}">
</head>
<!---------------------------------------------------------------------------------------------------->
@section('content')
<div class="container">



<!--------↓[パンくずリスト]↓----------->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">ホーム</a></li>
    <li class="breadcrumb-item"><a href="{{ route('computer.welcome') }}">コンピューター道場</a></li>
    <li class="breadcrumb-item active" aria-current="page">こどもタイピング</li>
  </ol>
</nav>
<!--------↑[パンくずリスト]↑----------->



<!--------↓[ランキング]↓----------->
@php
  $rank = 1;
@endphp
<h2 class="mt-5">ユーザーランキング</h2>
<div class="d-lg-flex flex-row w-100">
  @foreach($rankers as $ranker)
    @php
    if(!empty($prevrecord)){
      if($prevrecord == $ranker->computer_hiyokotyping_record){
      }else{
        $rank++;
      }
    }
    $prevrecord = $ranker->computer_hiyokotyping_record;
    @endphp
    <div class="col-lg-4 col-12 mr-2 mb-2 border shadow rounded">
      <h4>{{$rank}}位</h4>
      <div class="d-flex flex-row justify-content-around">
        <h4 class="font-weight-bold">{{$ranker->name}}</h4>
        <h4 class="text-info font-weight-bold">{{$ranker->computer_hiyokotyping_record}}点</h4>
      </div>
    </div>
  @endforeach
</div>
<!--------↑[ランキング]↑----------->



<!---------------------------------------↓↓[main]↓↓--------------------------------------------->
<section class="main container shadow-lg p-3 mb-5 bg-white rounded">

  <!--------↓[ルール]↓----------->
  <fieldset class="rule container col-lg-8 col-12">
    <legend>ルールせつめい</legend>
    初心者向けのタイピングゲームです<br>
    ２〜６文字の短い言葉が出題されます<br>
    文章は全てひらがなか、カタカナです<br>
    時間は1分間です<br>
    押すキーボードがわからなくなったら、ピンク色のヒントをみてください<br>
    お子様のタイピング練習にもぜひご利用ください<br>
  </fieldset>

  <!-----------------------↓↓[game]↓↓--------------------------->
  <div class="container border border-dark rounded p-0 my-5" style="height:550px;width:810px;">

    <!--------↓[start]↓----------->
    <section id="start" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center">
      <div class="h2 text-center"><img src="{{asset('img/hiyoko.png')}}" style="height: 100%;">こどもタイピング</div>
      <button id="startBtn" type="button" class="btn btn-primary d-block">スタート</button>
      <div class="h3 m-3 text-muted">Enterキーでも開始します</div>
    </section>

    <!--------↓[play]↓----------->
    <section id="play" class="d-none w-100 h-100">

      <div class="h-75 w-100">
        <div id="timer" class="h3 m-0">制限時間 ： 60.00</div>
        <div class='h-50 w-100 d-flex flex-column justify-content-center'>
          <div id="countdown" class="display-2 text-center" style="color:pink;"></div>
          <div id="sentence" class="h2 text-center font-weight-bold my-2"></div>
          <div class="h3 d-flex flex-row justify-content-center font-weight-bold my-2">
            <div id="typed_romaji" style="color:pink;"></div>
            <div id="romaji"></div>
          </div>
        </div>
        
        <!-----------------------↓↓[keyboad]↓↓--------------------------->
        <div class='h-50 w-100'>
          <!-- 1段目 -->
          <div class="d-flex flex-row">
            <div class="dummy-key" style="width:50px;"></div>
            <div class="key" id="1">1</div>
            <div class="key" id="2">2</div>
            <div class="key" id="3">3</div>
            <div class="key" id="4">4</div>
            <div class="key" id="5">5</div>
            <div class="key" id="6">6</div>
            <div class="key" id="7">7</div>
            <div class="key" id="8">8</div>
            <div class="key" id="9">9</div>
            <div class="key" id="0">0</div>
            <div class="key" id="-">-</div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="dummy-key" style="width:50px;"></div>
          </div>
          <!-- 2段目 -->
          <div class='d-flex flex-row'>
          <div class="dummy-key" style="width:70px;"></div>
            <div class="key" id="Q">Q</div>
            <div class="key" id="W">W</div>
            <div class="key" id="E">E</div>
            <div class="key" id="R">R</div>
            <div class="key" id="T">T</div>
            <div class="key" id="Y">Y</div>
            <div class="key" id="U">U</div>
            <div class="key" id="I">I</div>
            <div class="key" id="O">O</div>
            <div class="key" id="P">P</div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="dummy-key" style="width:84px;"></div>
          </div>
          <!-- 3段目 -->
          <div class='d-flex flex-row'>
          <div class="dummy-key" style="width:90px;"></div>
            <div class="key" id="A">A</div>
            <div class="key" id="S">S</div>
            <div class="key" id="D">D</div>
            <div class="key" id="F">F</div>
            <div class="key" id="G">G</div>
            <div class="key" id="H">H</div>
            <div class="key" id="J">J</div>
            <div class="key" id="K">K</div>
            <div class="key" id="L">L</div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="dummy-key" style="width:64px;"></div>
          </div>
          <!-- 4段目 -->
          <div class='d-flex flex-row'>
            <div class="key" id="shift-l" style="width:110px;">shift</div>
            <div class="key" id="Z">Z</div>
            <div class="key" id="X">X</div>
            <div class="key" id="C">C</div>
            <div class="key" id="V">V</div>
            <div class="key" id="B">B</div>
            <div class="key" id="N">N</div>
            <div class="key" id="M">M</div>
            <div class="key" id="comma">、</div>
            <div class="key" id="period">。</div>
            <div class="key" id="hatena">？</div>
            <div class="dummy-key" style="width:50px;"></div>
            <div class="key" id="shift-r" style="width:100px;">shift</div>
          </div>
          <!-- 5段目 -->
          <div class='d-flex flex-row'>
          <div class="dummy-key" style="width:310px;border:none;"></div>
            <div class="key" id="space" style="width:180px;"></div>
          </div>

        </div>
        <!-----------------------↑↑[keyboad]↑↑--------------------------->
      </div>

      <!--------↓[finger]↓----------->
      <div class="h-25 w-100 d-flex flex-row justify-content-center">
        <div class="finger finger-5" id="finger-l-5"></div>
        <div class="finger finger-4" id="finger-l-4"></div>
        <div class="finger finger-3" id="finger-l-3"></div>
        <div class="finger finger-2" id="finger-l-2"></div>
        <div class="finger finger-1 mr-5" id="finger-l-1"></div>
        <div class="finger finger-1 ml-5" id="finger-r-1"></div>
        <div class="finger finger-2" id="finger-r-2"></div>
        <div class="finger finger-3" id="finger-r-3"></div>
        <div class="finger finger-4" id="finger-r-4"></div>
        <div class="finger finger-5" id="finger-r-5"></div>
      </div>
      <!--------↑[finger]↑----------->
    </section>
    <!-- play -->

    <!--------↓[result]↓----------->
    <section id="result" class="d-none h-100">
      <div class="card w-100 h-100 shadow rounded">
        <div class="card-header">
          結果
        </div>
        <div class="card-body text-center p-4">
          <h3 class="card-text">
            <div class="h3 d-flex flex-row justify-content-center font-weight-bold">
              <h3>成功タイプ：</h3>
              <div id="correct" class="text-primary"></div>
              <h3>　-　ミスタイプ数：</h3>
              <div id="miss" class="text-danger"></div>
            </div>
          </h3>
          <h2 id="score" class="display-3 card-text my-3 text-success"></h2>
          <h3 id="percent" class="card-text my-2"></h3>
          <h3 id="speed" class="card-text my-2"></h3>
          <div id="userRecord" class="card-text" style="font-size:15px">
            @auth
              <div class="d-flex justify-content-center">
                <h2 id="gotCoinsLabel" style="color:gold;">+0</h2>
                <img src="{{asset('img/coin.png')}}" style="height:30px;width:30px;vertical-align:middle;">
              </div>

              <p id="userResultLabel">usernameさんの最高点 : recordScore点</p>
              <div id="updatedRecordLabel" class="d-none">
                <p class="alert alert-success">最高得点更新しました！</p>
              </div>
            @else
              <a href="{{route('login') }}" class="h3 my-2">
                @php
                  echo  'ユーザー登録すると得点が記録できます';
                @endphp
              </a>
            @endauth
          </div>
          <!-- #userRecord -->
          <button type="button" class="btn btn-primary mt-4" id="restartBtn">もう一度プレイ</button>
          <div class="h5 m-1 text-muted">Enterキーでも開始します</div>
        </div>
      </div>
      <!-- card -->
    </section>
    <!-- result -->
  </div>
  <!-- game -->
</section>
<!-- main -->
</div>
<!-- .container -->





<!--------↓[php->js データ受け渡し]↓----------->
<!-- userデータからphpへ -->
@auth
  @php
    $userid = $user->id;
    $username = $user->name;
    $recordScore = $user->computer_hiyokotyping_record;
  @endphp
  <script>
    let isUser = true;
    const userid = @json($userid);
    const username = @json($username);
    let recordScore = @json($recordScore);
  </script>
@else
  <script>
    let isUser = false;
  </script>
@endauth
<!--------↑[php->js データ受け渡し]↑----------->

<script src="{{asset('/js/computer_hiyokotyping.js')}}"></script>

@endsection