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

<body >
<?php
$activemenu="races";
include('../../global/menu.php'); 
include ('../../global/serverconnectionafterlogin.php');
?>

    <div class="jumbotron">
        <h1>Races</h1>
        <p></p>
            
        </p>
    </div>


    <div style="margin-left:15%; margin-right:15%;">
        
            
            <div class="container mt-2">

                <div class="row">

                    <?php 
                        $stmt = $conn->prepare("SELECT * FROM race");
                        $stmt->execute();
                         $row_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
                         foreach($row_stmt as $rs){
                            $raceid= $rs['race_id'];
                            $racename=$rs['race_name'];
                            $racedate=$rs['date_time'];
                            include('race_cards.php');
                            include('race_modals.php');
                         }



                    ?> 
            
                </div>
            </div>
         

</body>
