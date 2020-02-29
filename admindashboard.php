<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Bet Admin Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <link rel="stylesheet" href="css/accordion.css">
    <script src="js/adminhorse.js"></script>
    


</head>

<body>
<?php
$activemenu="dashboard";
include('menu.php'); 
?>
<div style="background-image: url('res/images/img11.jpg');">
<div style="margin: 5% 15% 0% 15%;background-color: light-purple; opacity:60% ">
   
<h2>ADMIN DASHBOARD</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#addnewraceform">Add New Race</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#addnewresultform">Add New Result</a>
    </li>
  </ul>

  <!-- Tab panes -->
<div class="tab-content">

    <div id="addnewraceform" class="container tab-pane active"><br>
        <form id="addraceform" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
                <div class="form-group">
                    <select class="form-control" name="racelist" form="raceform">
                        <option value="1">Race 1</option>
                        <option value="2">Race 2</option>
                        <option value="3">Race 3</option>
                        <option value="4">Race 4</option>
                        <option value="5">Race 5</option>
                        <option value="6">Race 6</option>
                        <option value="7">Race 7</option>
                    </select>
                    <input class="form-control" type="text" placeholder="Race Name" name="race_name" maxlength="100">
                    <label for="num_horses">Number of Horses(Minimum 4 per Race)</label>
                    <input type="number" id="num_horses" min="4" max="10" name="num_of_horses" onchange="adminrow();"><br>
                    <input type="text" placeholder="Horse 1 Name" name="horse1" maxlength="100"><br>
                    <input type="text" placeholder="Horse 2 Name" name="horse2" maxlength="100"><br>
                    <input type="text" placeholder="Horse 3 Name" name="horse3" maxlength="100"><br>
                    <input type="text" placeholder="Horse 4 Name" name="horse4" maxlength="100"><br>
                    <input type="text" placeholder="Horse 5 Name" name="horse5" maxlength="100"><br>
                    <input type="text" placeholder="Horse 6 Name" name="horse6" maxlength="100"><br>
            <!--    <input type="text" placeholder="Horse 7 Name" name="horse7" maxlength="100"><br>
                    <input type="text" placeholder="Horse 8 Name" name="horse8" maxlength="100"><br>
                    <input type="text" placeholder="Horse 9 Name" name="horse9" maxlength="100"><br>
                    <input type="text" placeholder="Horse 10 Name" name="horse10" maxlength="100"><br>  -->

                    <input class="btn btn-primary" id="newracesubmit" type="submit" value="Add New Race to database">
                </div>
    </div>

    <div id="addnewresultform" class="container tab-pane fade"><br>
      <h2>we will add a form here shortly
        here this is the result div</h2>
    </div>

  </div>
</div>









</div>
</div>

   




</body>


</html>