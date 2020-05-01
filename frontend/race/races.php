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
                        $racename="Race";
                        $racedate="19/03/2020";
                        for($i=1;$i<=10;$i++){
                            include('race_cards.php');
                            include('race_modals.php');
                        }
                    ?>
            
                </div>
            </div>
        <script>accordion();</script>  

</body>


