<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        


<!--------------------------------------------------------------
-----[style]の開始タグ----->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <!--cssファイルの設定など-->
        <link rel="stylessheet" href="{{asset('/css/welcome.css')}}">
<!-----[style]終了タグ-----
--------------------------------------------------------------->
        <script src="{{ asset('/js/app.js') }}"></script>
</head>

<body>

<!--ヘッダーとフッターの読み込み-->
@extends('layouts.app')

@section('content')
<!-----------------------------------------------------------------------------------------------------
-----[表紙]の開始タグ----->

<img class="w-100 mb-md-4" src="{{asset('img/shiromeshi_welcome.jpg')}}">

<!-----[表紙]終了タグ-----
------------------------------------------------------------------------------------------------------>


<!-- 一時的　あとで消去 -->
<div class="alert alert-warning" role="alert">
    現在ユーザー登録が使用できません。問題が解決されるまでゲストプレイでお楽しみください。
</div>




<!-- 残りのページを別のコンテナで囲んで、すべてのコンテンツを中央に配置 -->
<div class="container marketing">
<!-- 説明 -->
<div class="shadow rounded p-5">
    <div class="mb-5">
        <h2 class="font-weight-bold">しろめしゲームズとは？</h2>
        <hr>
        <p>しろめしゲームズは、<span class="text-success font-weight-bold">Web上で学習できる教育サイトです。</span></p>
        <p>そのまますぐに<a href="#menus">ゲームをプレイ</a>していただけますが、<a href="{{route('register')}}">無料のユーザー登録</a>を行うことで最高得点の記録などができます。</p>
        <p>ゲーム形式のため、勉強を嫌いにならずに学習ができます。</p>
        <br>
        <!-- <h4>・<a href="">サイトの詳しい説明</a></h4>
        <h4>・<a href="">注意事項</a></h4> -->
    </div>


    <!-----------------------------------------------------------------------------------------------------
    -----[サイト紹介]の開始タグ----->
    <h2 class="font-weight-bold">しろめしゲームズの遊び方</h2>
    <hr>

    <div class="row myy-5">
    <!------------------------------------------------------->
        <div class="col-lg-4">
            <img src="img/game.png"class="bd-placeholder-img mx-auto d-block" width="140" height="140"  preserveAspectRatio="xMidYMid slice"></img>
            <h3 class="text-center rounded font-weight-bold my-2">遊ぶ-Play</h3>
            <p class="text-center">紙とペンは使いません！<br>
                楽しくゲームをクリアするだけで<br>
                学習ができます</p>

        </div><!-- /.col-lg-4 -->
    <!------------------------------------------------------->
        <div class="col-lg-4">
        <img src="img/desktop_pc.png" class="bd-placeholder-img mx-auto d-block" width="140" height="140"></img>
        <h3 class="text-center rounded font-weight-bold my-2">学ぶ-Learn</h3>
        <p class="text-center">こだわりの学習内容を用意しています<br>
            遊びながら覚えるようにしましょう<br>
            <a href="#menus">↓ゲームメニューは↓</a></p>

        </div><!-- /.col-lg-4 -->
    <!------------------------------------------------------->
        <div class="col-lg-4">
            <img src="img/reward_gold.png" class="bd-placeholder-img mx-auto d-block" width="140" height="140"<rect fill="#777" width="100%" height="100%"/></img>
            <h3 class="text-center rounded font-weight-bold my-2">成長する-Grow</h3>
            <p class="text-center">称号が5段階あります<br>
                称号獲得を目指して高得点をとりましょう<br>
                称号を獲得するには<a href="{{asset('register')}}">無料ユーザー登録</a>をしてください</p>
        </div><!-- /.col-lg-4 -->
    <!------------------------------------------------------->
    </div><!-- /.row -->
    <!-----[サイト紹介]終了タグ-----
    ------------------------------------------------------------------------------------------------------>
</div>
<!-- 説明 -->


<!-----------------------------------------------------------------------------------------------------
-----[ジャンルメニュー]の開始タグ----->
<div id="menus">
    <h1 class="mt-5 font-weight-bold">ゲームメニュー</h1>
    <hr class="mb-2">
<!------------------------------------------------------->
    <a href="{{ route('brain.welcome') }}" style="text-decoration: none;">
        <div 
        class="row featurette my-4" 
        style="background: limegreen; display: flex; justify-content: center; align-items: center;"
        >
    
            <div class="col-md-7 my-5">
                <h2 class="display-4 featurette-heading bg-light font-weight-bold text-center m-3 rounded" style="color: limegreen;">脳トレラボ</h1>
                <p class="lead text-dark">脳トレで脳を活性化させよう！<br>
                手頃なゲームを使い脳をトレーニングしていきましょう！<br>
                ・電卓脳トレ<br>
                </p>
                <button type="button" class="btn btn-light">→脳トレラボに行く</button>
            </div>
            <div class="col-md-3 my-5 d-none d-md-block">
                <img src="img/brain.png" class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto d-block" preserveAspectRatio="xMidYMid slice"></img>
            </div>
        </div>
    </a>
<!------------------------------------------------------->
    <a href="webschool/welcome" style="text-decoration: none;">
        <div 
            class="row featurette my-4" 
            style="background: goldenrod; display: flex; justify-content: center; align-items: center;"
        >
            <div class="order-md-2 col-md-7 my-5">
                <h2 class="display-4 featurette-heading bg-light font-weight-bold text-center m-3 rounded" style="color: goldenrod;">Web学校</h2>
                <p class=" lead text-dark">学校の勉強がクイズ形式で学べます！<br>
                </p>
                <button type="button" class="btn btn-light">→Web学校に行く</button>
            </div>
            <div class="order-md-1 col-md-3 my-5 d-none d-md-block">
                <img src="img/textbook.png"class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto d-block" preserveAspectRatio="xMidYMid slice"></img>
            </div>
        </div>
    </a>
<!------------------------------------------------------->
<a href="computer/welcome" style="text-decoration: none;">
        <div 
        class="row featurette my-4" 
        style="background: turquoise; display: flex; justify-content: center; align-items: center;"
        >
    
            <div class="col-md-7 my-5">
                <h2 class="display-4 featurette-heading bg-light font-weight-bold text-center m-3 rounded" style="color: turquoise;">コンピューター道場</h2>
                <p class=" lead text-dark">コンピューター、インターネットに強くなろう！<br>
                これからはコンピューターの知識が必要です<br>
                </p>
                <button type="button" class="btn btn-light">→コンピューター道場に行く</button>
            </div>
            <div class="col-md-3 col-xs-1 my-5 d-none d-md-block">
                <img src="img/notepc.png"class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto d-block" preserveAspectRatio="xMidYMid slice"></img>
            </div>
        </div>
    </a>
</div><!-- #menus -->
<hr class="featurette-divider">
<!-----[ジャンルメニュー]終了タグ-----
------------------------------------------------------------------------------------------------------>


</div><!-- /.container -->


<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" integrity="sha384-1CmrxMRARb6aLqgBO7yyAxTOQE2AKb9GfXnEo760AUcUmFx3ibVJJAzGytlQcNXd" crossorigin="anonymous"></script>


@endsection
