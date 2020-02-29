<?php session_start(); ?>
<style> 
.active{
  background-color: purple;
  color: black;
  border-radius:5px;
  border: 2px solid white;
}
  </style>
<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top justify-content-between" >
<a class="navbar-brand " style="color:white;">Quick Bet</a>
<ul class="navbar-nav">
<li class="nav-item">
  <a href="index.php" class="nav-link
    <?php 
 if ($activemenu=="home")	
   echo "active";
 ?>">
Home</a>
</li>

<li class="nav-item">
  <a href="races.php" class="nav-link
    <?php 
 if ($activemenu=="races")	
   echo "active";
 ?>">
Races</a>
</li>

    
<li class="nav-item">
  <a href="results.php" class="nav-link disabled
    <?php 
 if ($activemenu=="results")	
   echo "active";
 ?>">
Results</a>
</li>


<li class="nav-item">
  <a href="aboutus.php" class="nav-link
    <?php 
 if ($activemenu=="aboutus")	
   echo "active";
 ?>">
About Us</a>
</li>

<li class="nav-item">
<a href="" class="nav-link">
    <?php 
 if (isset($_SESSION['user_name']))
   echo $_SESSION['user_name'];
 ?></a>
</li>

    <?php 
 if (isset($_SESSION['is_admin']))
 include('amenu.php');
 ?>

<li class="nav-item">
  <a href="<?php if (isset($_SESSION['user_name'])) { echo "logout.php";} else{ echo "login.php";} ?>" class="nav-link
    <?php 
 if ($activemenu=="login")	
   echo "active";
 ?>">
 <?php
  if (isset($_SESSION['user_name'])) {
    echo "Logout";
  }
  else{
 echo "Login/Register";
  }
 ?></a>
</li>

</ul>
</nav>