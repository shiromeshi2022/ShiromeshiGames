@extends('layouts.app')



<head>
  <title>県庁所在地クイズ【しろめしゲームズ / Web学校】</title >
  <meta name="description" content="47都道府県の県庁所在地を答えるクイズです。県庁所在地を覚えたい時に遊びましょう。子供むけ教育ゲーム【しろめしゲームズ】がおくるWeb学校ゲームの１つです。">

  <!-- publicのファイル読み込み -->
  <link rel="stylesheet" href="{{asset('/css/webschool_prefectures.css')}}">
</head>
<!---------------------------------------------------------------------------------------------------->
@section('content')
<div class="container">


<!--------↓[パンくずリスト]↓----------->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">ホーム</a></li>
    <li class="breadcrumb-item"><a href="{{ route('webschool.welcome') }}">Web学校</a></li>
    <li class="breadcrumb-item active" aria-current="page">県庁所在地クイズ</li>
  </ol>
</nav>
<!--------↑[パンくずリスト]↑----------->



<!---------------------------------------↓↓[main]↓↓--------------------------------------------->
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
  <div class="container border border-dark rounded col-lg-8 col-12 h-auto my-5">

    <!--------↓[start]↓----------->
    <section id="start" class="w-100 h-50 d-flex flex-column justify-content-center align-items-center"
      style="background-image: url({{asset('img/prefectures_background.png')}});
        background-color:rgba(255,255,255,0.6);
        background-blend-mode:lighten;
        background-position:center;
        background-repeat: no-repeat;
      ">
      <div class="h2">県庁所在地クイズ：47問</div>
      <button id="startBtn" type="button" class="btn btn-primary d-block">スタート</button>
    </section>

    <!--------↓[play]↓----------->
    <section id="play" class="d-none">
      <div class="d-flex mt-3">
        <p id="questionTurn" class="h5 m-0 mr-3">１問目</p>
        <p id="question" class="h4 font-weight-bold"></p>
      </div>
      <ul id="choices"></ul>
      <button id="nextBtn" class="btn btn-secondary d-block">次の問題</button>
      <p id="answer" class="h4 mt-3 mb-2"></p>
      <p id="explanation" class="h5"></p>
    </section>

    <!--------↓[result]↓----------->
    <section id="result" class="d-none text-center p-4">
      <p></p>
      <div id="userRecord" style="font-size:15px">
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



<!--------↓[php->js データ受け渡し]↓----------->
<!-- userデータからphpへ -->
@auth
  @php
    $userid = $user->id;
    $username = $user->name;
    $recordScore = $user->webschool_prefectures_record;
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

<script src="{{asset('/js/webschool_prefectures.js')}}"></script>

@endsection