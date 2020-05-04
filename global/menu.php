<?php session_start(); ?>
<nav class="navbar navbar-expand bg-dark navbar-dark fixed-top justify-content-between">
  <a class="navbar-brand " style="color:white;">Quick Bet</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a href="../home/index.php" class="nav-link
    <?php
    if ($activemenu == "home")
      echo "active";
    ?>">
        Home</a>
    </li>

    <li class="nav-item">
      <a href="../race/races.php" class="nav-link
    <?php
    if ($activemenu == "races")
      echo "active";
    ?>">
        Races</a>
    </li>


    <li class="nav-item">
      <a href="../result/results.php" class="nav-link 
    <?php
    if ($activemenu == "results")
      echo "active";
    ?>">
        Results</a>
    </li>


    <li class="nav-item">
      <a href="../aboutus/aboutus.php" class="nav-link
    <?php
    if ($activemenu == "aboutus")
      echo "active";
    ?>">
        About Us</a>
    </li>
    <?php
    if (isset($_SESSION['is_admin']))
      include('amenu.php');
    ?>
    <li class="nav-item">
      <a class="nav-link">
        <?php
        if (isset($_SESSION['user_name']))
          echo $_SESSION['user_name'];
        ?></a>
    </li>

    <li class="nav-item">
      <a href="<?php if (isset($_SESSION['user_name'])) {
                  echo "../../global/logout.php";
                } else {
                  echo "../login/login.php";
                } ?>" class="nav-link bg-success
    <?php
    if ($activemenu == "login")
      echo "active";
    ?>">
        <?php
        if (isset($_SESSION['user_name'])) {
          echo "Logout";
        } else {
          echo "Login/Register";
        }
        ?></a>
    </li>
  </ul>
</nav>