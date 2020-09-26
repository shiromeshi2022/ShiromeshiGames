@extends('layouts.app')

<head>
  <title>コンピューター道場【しろめしゲームズ】</title>
  <meta name="description" content="ゲームを遊んでコンピューターやテクノロジーに強くなれます。子供むけ教育ゲーム【しろめしゲームズ】がおくるコンピューター道場のホームページです。（タイピングゲームなど）">
</head>

@section('content')

<div 
  class="row featurette my-4" 
  style="background: turquoise; display: flex; justify-content: center; align-items: center;"
>
  <div class="col-md-7 my-5">
    <h2 class="featurette-heading bg-light font-weight-bold display-3 text-center m-3 rounded" style="color: turquoise;">コンピューター道場</h1>
  </div>
  <div class="d-none d-md-block col-md-3 my-5">
    <img src="../img/notepc.png"class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto d-block" preserveAspectRatio="xMidYMid slice"></img>
  </div>
</div>

<div class="container my-5">

<!--------↓[パンくずリスト]↓----------->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">ホーム</a></li>
    <li class="breadcrumb-item active" aria-current="page">コンピューター道場</li>
  </ol>
</nav>
<!--------↑[パンくずリスト]↑----------->



  <h1 class="mt-5">ゲームメニュー</h1>
  <hr class="mb-2">

  <div class="row">
    <!----------------------------------------------------------------------------------------------------
    -----[タイピングゲーム]の開始タグ----->
    <div class="card mx-auto my-3" style="width: 18rem; height:400px;">
      <img src="{{asset('img/typing.png')}}" class="bd-placeholder-img card-img-top border" width="100%" height="180" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#868e96"/></img>
      <div class="card-body d-flex flex-column">
        <h4 class="card-title">名言タイピング</h5>
        <p class="card-text">大人から子供まで遊べるタイピングゲームです。</p>
        <p class="card-text">高速タッチタイピングの練習に最適です。</p>
        <a href="{{ route('computer.typing') }}" class="btn btn-primary align-self-center">ゲームをプレイする</a>
      </div>
    </div>
    <!-----[タイピングゲーム]終了タグ-----
    ------------------------------------------------------------------------------------------------------>

    <!-----------------------------------------------------------------------------------------------------
    -----[ひよこタイピング]の開始タグ----->
    <div class="card mx-auto my-3" style="width: 18rem; height:400px;">
      <img src="{{asset('img/hiyoko.png')}}" class="bd-placeholder-img card-img-top border" width="100%" height="180" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#868e96"/></img>
      <div class="card-body d-flex flex-column">
        <h5 class="card-title">こどもタイピング</h5>
        <p class="card-text">子供向けのタイピングゲームです。</p>
        <p class="card-text">ローマ字を覚えながらパソコンに慣れることができます。</p>
        <a href="{{route('computer.hiyokotyping')}}" class="btn btn-primary align-self-center">ゲームをプレイする</a>
      </div>
    </div>
    <!-----[ひよこタイピング]終了タグ-----
    ------------------------------------------------------------------------------------------------------>


  </div>
</div>
@endsection