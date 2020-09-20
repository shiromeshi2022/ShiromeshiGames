@extends('layouts.app_light')

@section('content')
@php
    $diamond = 0;
    $gold = 0;
    $silver = 0;
    $tan = 0;
    $beginner = 0;
    $total_game = 0;
@endphp
<!---------------------------------------↓↓↓[点と称号を決める]↓↓↓--------------------------------------------->
<!--------↓[電卓]↓----------->
@php
    $brain_calculate_record = $user->brain_calculate_record;
    if($brain_calculate_record >= 100){$brain_calculate_reward = 'diamond'; $brain_calculate_level = 'ダイヤモンド';$diamond++;}
    elseif($brain_calculate_record >= 80){$brain_calculate_reward = 'gold'; $brain_calculate_level = '金';$gold++;}
    elseif($brain_calculate_record >= 60){$brain_calculate_reward = 'silver'; $brain_calculate_level = '銀';$silver++;}
    elseif($brain_calculate_record >= 40){$brain_calculate_reward = 'tan'; $brain_calculate_level = '銅';$tan++;}
    else{$brain_calculate_reward = 'beginner'; $brain_calculate_level = '初心者';$beginner++;}
    $total_game++;
@endphp
<!--------↑[電卓]↑----------->
<!--------↓[県庁所在地]↓----------->
@php
    $webschool_prefectures_record = $user->webschool_prefectures_record;
    if($webschool_prefectures_record >= 47){$webschool_prefectures_reward = 'diamond'; $webschool_prefectures_level = 'ダイヤモンド';$diamond++;}
    elseif($webschool_prefectures_record >= 35){$webschool_prefectures_reward = 'gold'; $webschool_prefectures_level = '金';$gold++;}
    elseif($webschool_prefectures_record >= 25){$webschool_prefectures_reward = 'silver'; $webschool_prefectures_level = '銀';$silver++;}
    elseif($webschool_prefectures_record >= 15){$webschool_prefectures_reward = 'tan'; $webschool_prefectures_level = '銅';$tan++;}
    else{$webschool_prefectures_reward = 'beginner'; $webschool_prefectures_level = '初心者';$beginner++;}
    $total_game++;
@endphp
<!--------↑[県庁所在地]↑----------->
<!--------↓[名言タイピング]↓----------->
@php
    $computer_typing_record = $user->computer_typing_record;
    if($computer_typing_record >= 300){$computer_typing_reward = 'diamond'; $computer_typing_level = 'ダイヤモンド';$diamond++;}
    elseif($computer_typing_record >= 200){$computer_typing_reward = 'gold'; $computer_typing_level = '金';$gold++;}
    elseif($computer_typing_record >= 100){$computer_typing_reward = 'silver'; $computer_typing_level = '銀';$silver++;}
    elseif($computer_typing_record >= 50){$computer_typing_reward = 'tan'; $computer_typing_level = '銅';$tan++;}
    else{$computer_typing_reward = 'beginner'; $computer_typing_level = '初心者';$beginner++;}
    $total_game++;
@endphp
<!--------↑[名言タイピング]↑----------->
<!--------↓[ひよこタイピング]↓----------->
@php
    $computer_hiyokotyping_record = $user->computer_hiyokotyping_record;
    if($computer_hiyokotyping_record >= 100){$computer_hiyokotyping_reward = 'diamond'; $computer_hiyokotyping_level = 'ダイヤモンド';$diamond++;}
    elseif($computer_hiyokotyping_record >= 80){$computer_hiyokotyping_reward = 'gold'; $computer_hiyokotyping_level = '金';$gold++;}
    elseif($computer_hiyokotyping_record >= 50 ){$computer_hiyokotyping_reward = 'silver'; $computer_hiyokotyping_level = '銀';$silver++;}
    elseif($computer_hiyokotyping_record >= 20){$computer_hiyokotyping_reward = 'tan'; $computer_hiyokotyping_level = '銅';$tan++;}
    else{$computer_hiyokotyping_reward = 'beginner'; $computer_hiyokotyping_level = '初心者';$beginner++;}
    $total_game++;
@endphp
<!--------↑[ひよこタイピング]↑----------->

<!-- 最高得点を合計[ゲームを追加ごとに書き込み] -->
@php
    $total_score = $brain_calculate_record+$webschool_prefectures_record+$computer_typing_record+$computer_hiyokotyping_record;
@endphp
<!---------------------------------------↑↑↑[点と称号を決める]↑↑↑--------------------------------------------->
<head>
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
</head>






<div class="container-fluid">



<!-- タイトル -->
<div class="h3 m-3">{{$user->name}}さんのマイページ</div>
<hr>

<div class="d-xl-flex flex-row">
    <!-----------------------↓↓[プロフィール]↓↓--------------------------->
    <div class="profile-window my-4 mx-auto p-2 bg-white shadow rounded border d-flex flex-column justify-content-center align-items-center" style="width:400px;height:400px">
        <h4 class="pin-title font-weight-bold"><img src="{{asset('img/pin.png')}}">Profile</h4>
        <h1 class="font-weight-bold">{{$user->name}}</h1>
        <img src="{{asset('img/icon_normal.png')}}" class="icon border border-secondary rounded-circle m-3">
        <h4>{{$user->email}}</h4>
        <a href="{{route('home.edit')}}" class="btn btn-danger btn-sm flex-end align-self-center mt-3 w-75">プロフィールを編集する</a>
    </div>
    <!-----------------------↑↑[プロフィール]↑↑--------------------------->



    <!-----------------------↓↓[称号]↓↓--------------------------->
    <div class="rank-window col-11 my-4 mx-auto bg-white border rounded shadow">
    <h4 class="pin-title font-weight-bold"><img src="{{asset('img/pin.png')}}">Rank</h4>
        <div class="d-md-flex flex-row text-center">

                <div class="mt-5 m-md-auto">
                    <h4>最高得点合計</h4>
                    <div class="display-4 text-success">{{$total_score}}点</div>
                </div>
                <div class="mt-md-5 m-md-auto mr-md-0">
                    <h4>ダイヤ率</h4>
                    <div class="display-4 text-info">{{$diamond}} / {{$total_game}}</div>
                </div>

            <!-- 円グラフ -->
            <div id="piechart" class="my-3 mx-md-0 mx-auto" style="height:200px;"></div>
        </div>

        <div class="d-flex flex-row justify-content-around mt-3">
            <div class="col-3 p-0 text-center">
                <div class="my-1 w-100" style="background:lightskyblue;">ダイヤモンド</div>
                <h1 class="display-4" style="color:lightskyblue;">{{$diamond}}</h1>
            </div>
            <div class="col-2 p-0 text-center">
                <div class="my-1 w-100" style="background:gold;">金</div>
                <h1 class="display-4" style="color:gold;">{{$gold}}</h1>
            </div>
            <div class="col-2 p-0 text-center">
                <div class="my-1 w-100" style="background:silver;">銀</div>
                <h1 class="display-4" style="color:silver;">{{$silver}}</h1>
            </div>
            <div class="col-2 p-0 text-center">
                <div class="my-1 w-100" style="background:tan;">銅</div>
                <h1 class="display-4" style="color:tan;">{{$tan}}</h1>
            </div>
            <div class="col-2 p-0 text-center">
                <div class="my-1 w-100 text-white" style="background:black;">初心者</div>
                <h1 class="display-4" style="color:brack;">{{$beginner}}</h1>
            </div>
        </div>

    </div>
    <!-----------------------↑↑[称号]↑↑--------------------------->

</div>
<!-- d-flex -->



<!--------↓[所持金]↓----------->
<div class="game-window col-11 my-2 ml-xl-4 mr-xl-auto mx-auto bg-white border rounded shadow d-md-flex flex-row">
<h4 class="pin-title font-weight-bold"><img src="{{asset('img/pin.png')}}">Coins</h4>
    <div class="display-3 mx-md-auto text-center font-weight-bold" style="color:gold;">
        <div>
            {{$user->coins}}
            <img src="{{asset('img/coin.png')}}" style="height:50px; width:50px; vertical-align:middle">
        </div>
    </div>
</div>
<!--------↑[所持金]↑----------->



<!-----------------------↓↓[game成績]↓↓--------------------------->
<!--------↓[電卓ノウトレ]↓----------->
<div class="game-window col-11 my-2 ml-xl-4 mr-xl-auto mx-auto bg-white border rounded shadow d-md-flex flex-row">
    <div class="my-2 m-md-4 mx-auto d-flex flex-column" style="width: 286px;">
        <div class="d-flex flex-row m-2">
            <div class="game-mark" style="background:limegreen;"></div>
            <h3 class="game-title">電卓ノウトレ</h3>
        </div>

        <img class="border border-secondary rounded" src="{{asset('img/brain_calculate.png')}}" style="height:180px;width:286px;">
        <a class="btn btn-primary d-block" href="{{route('brain.calculate')}}">ゲームをプレイ</a>
        <h2 class="mt-4 text-center">最高得点：{{$brain_calculate_record}}点</h2>
    </div>
    <!--------------------------->
    <div class="h-100 w-100 text-center">
        <img class="mt-md-5" src="{{asset('img/reward_'.$brain_calculate_reward.'.png')}}">
        <h2 class="mb-3 font-weight-bold">称号：{{$brain_calculate_level}}</h2>
    </div>
</div>
<!--------↑[電卓ノウトレ]↑----------->
<!--------↓[県庁所在地クイズ]↓----------->
<div class="game-window col-11 my-2 ml-xl-4 mr-xl-auto mx-auto bg-white border rounded shadow d-md-flex flex-row">
    <div class="my-2 m-md-4 mx-auto d-flex flex-column" style="width: 286px;">
        <div class="d-flex flex-row m-2">
            <div class="game-mark" style="background:goldenrod;"></div>
            <h3 class="game-title">県庁所在地クイズ</h3>
        </div>

        <img class="border border-secondary rounded" src="{{asset('img/prefectures_card.png')}}" style="height:180px;width:286px;">
        <a class="btn btn-primary d-block" href="{{route('webschool.prefectures')}}">ゲームをプレイ</a>
        <h2 class="mt-4 text-center">最高得点：{{$webschool_prefectures_record}}点</h2>
    </div>
    <!--------------------------->
    <div class="h-100 w-100 text-center">
        <img class="mt-md-5" src="{{asset('img/reward_'.$webschool_prefectures_reward.'.png')}}">
        <h2 class="mb-3 font-weight-bold">称号：{{$webschool_prefectures_level}}</h2>
    </div>
</div>
<!--------↑[県庁所在地クイズ]↑----------->
<!--------↓[名言タイピング]↓----------->
<div class="game-window col-11 my-2 ml-xl-4 mr-xl-auto mx-auto bg-white border rounded shadow d-md-flex flex-row">
    <div class="my-2 m-md-4 mx-auto d-flex flex-column" style="width: 286px;">
        <div class="d-flex flex-row m-2">
            <div class="game-mark" style="background:turquoise;"></div>
            <h3 class="game-title">名言タイピング</h3>
        </div>

        <img class="border border-secondary rounded" src="{{asset('img/typing.png')}}" style="height:180px;width:286px;">
        <a class="btn btn-primary d-block" href="{{route('computer.typing')}}">ゲームをプレイ</a>
        <h2 class="mt-4 text-center">最高得点：{{$computer_typing_record}}点</h2>
    </div>
    <!--------------------------->
    <div class="h-100 w-100 text-center">
        <img class="mt-md-5" src="{{asset('img/reward_'.$computer_typing_reward.'.png')}}">
        <h2 class="mb-3 font-weight-bold">称号：{{$computer_typing_level}}</h2>
    </div>
</div>
<!--------↑[名言タイピング]↑----------->
<!--------↓[ひよこタイピング]↓----------->
<div class="game-window col-11 my-2 ml-xl-4 mr-xl-auto mx-auto bg-white border rounded shadow d-md-flex flex-row">
    <div class="my-2 m-md-4 mx-auto d-flex flex-column" style="width: 286px;">
        <div class="d-flex flex-row m-2">
            <div class="game-mark" style="background:turquoise;"></div>
            <h3 class="game-title">こどもタイピング</h3>
        </div>

        <img class="border border-secondary rounded" src="{{asset('img/hiyoko.png')}}" style="height:180px;width:286px;">
        <a class="btn btn-primary d-block" href="{{route('computer.hiyokotyping')}}">ゲームをプレイ</a>
        <h2 class="mt-4 text-center">最高得点：{{$computer_hiyokotyping_record}}点</h2>
    </div>
    <!--------------------------->
    <div class="h-100 w-100 text-center">
        <img class="mt-md-5" src="{{asset('img/reward_'.$computer_hiyokotyping_reward.'.png')}}">
        <h2 class="mb-3 font-weight-bold">称号：{{$computer_hiyokotyping_level}}</h2>
    </div>
</div>
<!--------↑[ひよこタイピング]↑----------->
<!-----------------------↑↑[game成績]↑↑--------------------------->



</div>
<!-- .container-fluid -->


<script>
    const diamond = @json($diamond);
    const gold = @json($gold);
    const silver = @json($silver);
    const tan = @json($tan);
    const beginner = @json($beginner);
</script>


<!--------↓[chart script]↓----------->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.load("visualization", "1", {packages:["corechart"]});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
        const data = google.visualization.arrayToDataTable([ //グラフデータの指定
            ['rank', 'Ranks per AllGames'],
            ['称号なし', beginner],
            ['銅', tan],
            ['銀', silver],
            ['金', gold],
            ['ダイヤ', diamond],
        ]);
        const options = { //オプションの指定
            pieSliceText: 'label',
            colors: ['black', 'tan', 'silver', 'gold', 'lightskyblue'],
            legend: 'none',
            chartArea: {'width': '90%', 'height': '90%'},
            margin: 0,

        };
        const chart = new google.visualization.PieChart(document.getElementById('piechart')); //グラフを表示させる要素の指定
        chart.draw(data, options);
    }
</script>


@endsection
