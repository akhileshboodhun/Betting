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

    <li class="nav-item">
      <a href="#" class="nav-link <?php if (isset($_SESSION['user_name'])) {
                  echo "modal-trigger fa fa-plus-square\" data-toggle=\"modal\" data-target=\"#modalBalance$userid";
                } else {
                  echo "";
                } ?>" class="nav-link bg-success
    <?php
    if ($activemenu == "login")
      echo "active";
    ?>">
        <?php
        if (isset($_SESSION['user_name'])) {
          include('serverconnectionafterlogin.php');
          $username = $_SESSION['user_name'] ;
          $stmt = $conn->prepare("SELECT n.balance AS balance FROM normal_user n JOIN user u WHERE n.user_id = u.user_id AND u.user_name = '$username' ");
          //$stmt->bindParam(':username', $username );
          var_dump($stmt);
          $stmt->execute();
          $row_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
          $balance = $row_stmt['balance'];
          echo "BALANCE : " .$balance;
        } else {
          echo "";
        }
         ?> </a>

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