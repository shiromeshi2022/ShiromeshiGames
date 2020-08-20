<head>
  <style>
    .page-footer a{
      text-decoration: none;
      color: white;
    }
  </style>
</head>
<!-----------------------------------------------------------------------------------------------------
-----[フッター]の開始タグ----->
<footer class="page-footer font-small bg-secondary">

  <!-- Footer Links -->
  <div class="container text-center text-md-left text-white">
    <!-- Grid row -->
    <div class="row">
        <!-- Grid column -->
        <div class="col-md-3 mx-auto">
        <!-- Links -->
        <a href="{{route('welcome')}}">
          <h5 class="font-weight-bold text-uppercase mt-3 mb-4">ShiromeshiGames</h5>
        </a>
        <ul class="list-unstyled">

        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">
          <a href="{{route('brain.welcome')}}" style="color:limegreen;">脳トレラボ</a>
        </h5>

        <ul class="list-unstyled">
          <li>
            <a href="{{route('brain.calculate')}}">電卓ノウトレ</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">
          <a href="{{route('webschool.welcome')}}" style="color:goldenrod;">Web学校</a>
        </h5>

        <ul class="list-unstyled">
          <li>
            <a href="{{route('webschool.prefectures')}}">県庁所在地クイズ</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none">

      <!-- Grid column -->
      <div class="col-md-3 mx-auto">

        <!-- Links -->
        <h5 class="font-weight-bold text-uppercase mt-3 mb-4">
          <a href="{{route('computer.welcome')}}" style="color:turquoise;">コンピューター道場</a>
        </h5>

        <ul class="list-unstyled">
          <li>
            <a href="{{route('computer.typing')}}">名言タイピング</a>
          </li>
          <li>
            <a href="{{route('computer.hiyokotyping')}}">ひよこタイピング</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
  <!-- Footer Links -->

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">© 2020 ShiromeshiGames

  </div>
  <!-- Copyright -->

</footer>
<!-----[フッター]終了タグ-----
------------------------------------------------------------------------------------------------------>