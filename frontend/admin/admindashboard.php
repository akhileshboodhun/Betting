<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Bet Admin Dashboard</title>
    <link rel="stylesheet" href="../../css/bootstrap.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="../../js/jquery-3.4.1.js"></script>
    <script src="../../js/bootstrap.js"></script>
    <link rel="stylesheet" href="../../css/accordion.css">
    <script src="../../js/adminhorse.js"></script>
    


</head>

<body>
<?php
$activemenu="dashboard";
include('../../global/menu.php'); 
?>
   
   <div class="jumbotron">
        <h1>Admin Dashboard</h1>
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold">Toggle Side Menu</small></button>

    </div>
    <div class="container" stlye="margin-top: -50%" >
        <?php include('dashboardsidemenu.php');?>
        
    </div>
    
    



   




</body>


</html>