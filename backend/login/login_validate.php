<?php

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$login_email = $login_password = $emailerr = $passworderr = $Msg="";




if ($_SERVER["REQUEST_METHOD"] == "POST") {

  if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
   
    if (!empty($_POST["login_email"])) {
      $login_email = clean_input($_POST["login_email"]);
        if (!filter_var($_POST['login_email'], FILTER_VALIDATE_EMAIL)) {
          $emailerr = 'Email is not valid!<br>';
        }
    } else {
        $emailerr = "Email is required.<br>";
      }

    if (!empty($_POST["login_password"])) {
        $login_password = clean_input($_POST["login_password"]);
    } else {
            $passworderr = "Please enter password.<br>";
      }


  




    //IF THE ERROR MESSAGES ARE STILL EMPTY, THEN PROCEED
    if($emailerr == "" && $passworderr == "" )
    {
      //We hashed passwords using   
      //$hashed_password = password_hash($password,PASSWORD_DEFAULT);
        //References http://php.net/manual/en/function.password-verify.php
        require_once "../../global/server.php";
        $sQuery = "SELECT user_id,user_name, password FROM user WHERE email = '$login_email'  ";
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      
      $Result = $conn->query($sQuery) ;
      $userResults = $Result->fetch(PDO::FETCH_ASSOC);
      if($userResults['user_name'] ){	//the user exists
          $hashed_password = $userResults['password'];
          if(password_verify($login_password,$hashed_password)){
            session_start();
              $_SESSION['user_name'] = $userResults['user_name'] ;
              $_SESSION['user_id'] = $userResults['user_id'] ;
              $temp_user_id = $userResults['user_id'];
              $s2query = "SELECT is_admin FROM admin WHERE user_id= $temp_user_id";
              $Result2 = $conn->query($s2query) ;
              $userResults2 = $Result2->fetch(PDO::FETCH_ASSOC);
              if($userResults2['is_admin']){
                $_SESSION['is_admin'] = true;
                header("Location: ../../../frontend/admin/admindashboard.php");
              }
              header("Location: ../../index.php");
          }
          else{
              $Msg = "Password ERROR: Your credentials seem to be wrong. Try again or make sure you are a registered user!<br>";
          }
          
      }
      else{
         $Msg = "User name ERROR: Your credentials seem to be wrong. Try again or make sure you are a registered user!<br>";
      }
    }//end if
  }
}//end else 
    
  
?>