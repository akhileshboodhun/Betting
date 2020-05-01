<?php 
include('../../global/server.php');
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
    if ($stmt = $conn->prepare('INSERT INTO horse (horse_name, horse_dob, horse_weight, stable_id) VALUES (:horsename, :horsedob, :horseweight,:stableid)')) {
        $reg_email = $_POST['reg_email'];
        $stmt->bindParam(':horsename', $_POST['reg_username']);
        $stmt->bindParam(':horsedob', $_POST['reg_email']);
        $stmt->bindParam(':horseweight', $_POST['reg_username']);
        $stmt->bindParam(':stableid', $_POST['reg_email']);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

    }

}
?>