@extends('layouts.app')



<head>
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
  <div class="container border border-dark rounded col-lg-8 col-12 h-50 my-5">

    <!--------↓[start]↓----------->
    <section id="start" class="w-100 h-100 d-flex flex-column justify-content-center align-items-center"
      style="background-image: url({{asset('img/prefectures_background.png')}});
        background-color:rgba(255,255,255,0.6);
        background-blend-mode:lighten;
        background-position:center;
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
    <section id="result" class="d-none">
      <p></p>
      <div id="userRecord" style="font-size:15px">
        @auth
          @php
          $recordScore = $user->webschool_prefectures_record;
          @endphp
          <div>
            <p id="showRecord">{{$user->name}}さんの最高点 : {{$recordScore}}</p>
            <p id="informRecord" class="alert alert-success d-none">最高得点更新しました！</p>
            <form method="POST" action="{{ url('webschool/prefectures_record/'.$user->id) }}" id="sendRecord">
              @csrf
              <input type="hidden" name="webschool_prefectures_record" id="sendRecordInput">
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



<!--------↓[php->js データ受け渡し]↓----------->
<!-- userデータからphpへ -->
@auth
  @php
    $recordScore = $user->webschool_prefectures_record;
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
<!--------↑[php->js データ受け渡し]↑----------->

<script src="{{asset('/js/webschool_prefectures.js')}}"></script>

@endsection