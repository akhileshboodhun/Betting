<?php 
include('server.php');
$MsgErr = "";
// Now we check if the data was submitted, isset() function will check if the data exists.
if (isset($_POST['reg_email'], $_POST['reg_pass'])) {

        // Make sure the submitted registration values are not empty.
        if (empty($_POST['reg_email']) || empty($_POST['reg_pass'])) {
            // One or more values are empty.
            $MsgErr = $MsgErr . 'Please complete the registration form<br>';
        }

        if (!filter_var($_POST['reg_email'], FILTER_VALIDATE_EMAIL)) {
            $MsgErr = $MsgErr . 'Email is not valid!<br>';
        }


        if (preg_match('/[A-Za-z0-9]+/', $_POST['reg_pass']) == 0) {
            $MsgErr = $MsgErr . 'Password is not valid!<br>';
        }
        if (preg_match('/[A-Za-z0-9]+/', $_POST['reg_username']) == 0) {
            $MsgErr = $MsgErr . 'Username is not valid!<br>';
        }

        if (strlen($_POST['reg_pass']) > 30 || strlen($_POST['reg_pass']) < 8) {
            $MsgErr = $MsgErr . 'Password must be between 8 and 30 characters long!<br>';
        }
        if ($_POST['reg_pass']!=$_POST['reg_pass_confirm']){
            $MsgErr = $MsgErr . 'Passwords don\'t match<br>';
        }

    if($MsgErr==""){
    // We need to check if the account with that username exists.
    if ($stmt = $conn->prepare('SELECT user_id, user_name password FROM user WHERE email = :reg_email')) {
        // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
        $stmt->bindParam(':reg_email', $_POST['reg_email']);
        $stmt->execute();
        //$stmt->store_result();
        // Store the result so we can check if the account exists in the database.
        if ($stmt->rowCount() > 0) {
            // Email already exists
            echo 'Email exists, please choose another!';
        } else {
            // Insert new account
        }
        //$stmt->close();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }
    //$conn->close();

    // Username doesnt exists, insert new account
    if ($stmt = $conn->prepare('INSERT INTO user (user_name, email, password) VALUES (:username, :email, :password)')) {
        $reg_email = $_POST['reg_email'];
        // We do not want to expose passwords in our database, so hash the password and use password_verify when a user logs in.
        $password = password_hash($_POST['reg_pass'], PASSWORD_DEFAULT);
        $stmt->bindParam(':username', $_POST['reg_username']);
        $stmt->bindParam(':email', $_POST['reg_email']);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $sQuery = "SELECT user_id FROM user WHERE email = '$reg_email'";
        $Result = $conn->query($sQuery) ;
      $userResults = $Result->fetch(PDO::FETCH_ASSOC);
      $userid = $userResults['user_id'];
      $date = $_POST['reg_user_dob'];
      $s2Query = "INSERT INTO normal_user (user_id,user_dob) VALUES($userid,'$date')";
      echo $userid;
      echo "boo";
      echo $date;
      $stmt2 = $conn->prepare($s2Query);
      $stmt2->execute();
      var_dump( $stmt2);
        $_SESSION['user_name']= $_POST['reg_username'];
        echo 'You have successfully registered, you can now login!';
        header("Location: index.php");
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

    }

}
?>