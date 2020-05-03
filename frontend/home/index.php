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
    <style>
      .x {
        position: absolute;
        z-index: 83;
        top: 250px;

        color: white;
        font: url("../../css/Mukta.css");

        font-size: 25px;
        background-color: black;
        opacity: 0.6;
        margin: 0% 10% 0% 10%;
      }
    </style>


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
  <div  class="container " class="col-md-12">
    <h1 class="jumbotron;background:inherit;">Quick Bet</h1>
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
                    <th class="text-light">Topic title</th>
                    <th class="text-light">Category</th>
                    <th></th>
                    </tr>';
        $id = $race['race_id'];
        $horsedetails = "SELECT * from horse,horse_race where horse.horse_id=horse_race.horse_id and horse_race.race_id='$id' ";
        $selection = $conn->prepare($horsedetails);
        $selection->execute();
        $horses = $selection->fetchAll();
        foreach ($horses as $horse) {

          echo '<tr>';
          echo '<td class="text-light" >' . $horse['horse_name'] . '</td>';
          echo '<td class="text-light" >' . $horse['horse_weight'] . '</td>';
          echo '</tr>';
        }
        echo '</table>';
      }
      ?>
    </p>
  </div>




</body>

</html>