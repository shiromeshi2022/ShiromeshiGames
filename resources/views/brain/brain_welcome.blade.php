@extends('layouts.app')
@section('content')



<div 
  class="row featurette" 
  style="background: limegreen; display: flex; justify-content: center; align-items: center;"
>
  <div class="col-md-7 my-5">
    <h2 class="featurette-heading bg-light font-weight-bold display-3 text-center m-3 rounded" style="color: limegreen;">脳トレラボ</h1>
  </div>
  <div class="d-none d-md-block col-md-3 my-5">
    <img src="../img/brain.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto d-block" preserveAspectRatio="xMidYMid slice"></img>
  </div>
</div>



<div class="container my-5">

<!--------↓[パンくずリスト]↓----------->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">ホーム</a></li>
    <li class="breadcrumb-item active" aria-current="page">脳トレラボ</li>
  </ol>
</nav>
<!--------↑[パンくずリスト]↑----------->



  <h1 class="mt-5">ゲームメニュー</h1>
  <hr class="mb-2">

  <div class="row">
    <!----------------------------------------------------------------------------------------------------
    -----[電卓card]の開始タグ----->
    <div class="card mx-auto my-3" style="width: 18rem; height:400px;">
      <img src="{{asset('img/brain_calculate.png')}}" class="bd-placeholder-img card-img-top border" width="100%" height="180" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#868e96"/></img>
      <div class="card-body d-flex flex-column">
        <h4 class="card-title">電卓ノウトレ</h5>
        <p class="card-text">1~100までの数字がランダムで表示され、素早くその数字になるように電卓を叩く計算ゲーム</p>
        <a href="{{ route('brain.calculate') }}" class="btn btn-primary align-self-center">ゲームをプレイする</a>
      </div>
    </div>
    <!-----[電卓card]終了タグ-----
    ------------------------------------------------------------------------------------------------------>

    <!-----------------------------------------------------------------------------------------------------
    -----[ゲームcard]の開始タグ----->
    <div class="card mx-auto my-3 d-flex flex-column" style="width: 18rem; height:400px;">
      <img src="../img/under_construct.png" class="bd-placeholder-img card-img-top " width="100%" height="180" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Image cap"><rect width="100%" height="100%" fill="#868e96"/></img>
      <div class="card-body d-flex flex-column">
        <h5 class="card-title">開発中</h5>
        <p class="card-text">まもなく公開予定です<br>
        <br>
        </p>
        <a href="#" class="btn btn-secondary align-self-center">ゲームをプレイする</a>
      </div>
    </div>
    <!-----[ゲームcard]終了タグ-----
    ------------------------------------------------------------------------------------------------------>


  </div>
</div>
@endsection