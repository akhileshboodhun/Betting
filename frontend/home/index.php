<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quick Bet Home</title>
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" href="../../css/style1.css">
  <script src="../../js/jquery-3.4.1.js"></script>
  <script src="../../js/bootstrap.js"></script>
  <link rel="stylesheet" href="../../css/accordion.css">
  <script src="../../js/accordion.js"></script>
  <style>
    .active {
      color: white;
    }
  </style>
  <<link rel="stylesheet" href="../../css/overlayvideo.css">
</head>

<body>
  <?php
  $activemenu = "home";
  include('../../global/menu.php');
  ?>


  <div class="container">
    <video autoplay muted loop id="myVideo">
      <source src="../../res/videos/horse.m4v" type="video/mp4">
      Your browser does not support HTML5 video.
    </video>
  </div>
  <div class="container " class="col-md-12">
    <br>
    <h1 class="text-light"  class="jumbotron;background:inherit;">Quick Bet</h1>
    <p>
      <?php
      include('../../global/serverconnectionafterlogin.php');
      $racequery = "SELECT * from race";
      $selection = $conn->prepare($racequery);
      $selection->execute();
      $races = $selection->fetchAll();
      foreach ($races as $race) {
        echo '<h3  class="text-light">' . $race['race_name'] . '</h3>                    
                    <table class="table">
                    <tr>
                    <th class="text-light">Horsename</th>
                    <th class="text-light">Weight</th>
                    <th></th>
                    </tr>';
        $id = $race['race_id'];
        $stmt2 = $conn->prepare("SELECT * from vw_homepage_show_racesdetailed where race_id = $id");
        $stmt2->execute();
        $rs = $stmt2->fetchAll();
        foreach ($rs as $dispinfo) {

          echo '<tr>';
          echo "<td class=\"text-light\" >" . $dispinfo['horse_name'] . "</td>";
          echo "<td class=\"text-light\" >" . $dispinfo['horse_weight'] . "</td>";
          echo "<td class=\"text-light\" >" . $dispinfo['jockey_name'] . "</td>";
          echo "<td class=\"text-light\" >" . $dispinfo['stable_name'] . "</td>";
          echo '</tr>';
        }
        echo '</table>';
      }
      ?>
    </p>
  </div>




</body>

</html>