<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Races</title>

    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style1.css">
    <script src="../../js/jquery-3.4.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../css/accordion.css">
    <script src="../../js/accordion.js"></script>
    <link rel="stylesheet" href="../../css/betbuttons.css">
</head>

<body>
    <?php
    $activemenu = "races";
    include('../../global/menu.php');
    include('../../global/serverconnectionafterlogin.php');
    ?>
    <div class="container">
        <video autoplay muted loop id="myVideo">
            <source src="../../res/videos/horse.m4v" type="video/mp4">
            Your browser does not support HTML5 video.
        </video>
        <div class="jumbotron">
            <h1>Races</h1>
            <p></p>

            </p>
        </div>
        <div >
            <div class="container mt-2">
                <div class="row">
                    <?php
                    $stmt = $conn->prepare("SELECT * FROM race WHERE race_id NOT IN (SELECT race_id FROM vw_results);");
                    $stmt->execute();
                    $row_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($row_stmt as $rs) {
                        $raceid = $rs['race_id'];
                        $racename = $rs['race_name'];
                        $racedate = $rs['date_time'];
                        include('race_cards.php');
                        include('race_modals.php');
                    }



                    ?>

                </div>
            </div>

            <script src="../../js/jquery.bootstrap-touchspin.js"></script>
            <script src="../../js/touchspin_apply.js"></script>
           <script src="../../js/add_universal_form.js"></script>
</body>