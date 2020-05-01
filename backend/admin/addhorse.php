<?php 
include('../../global/server.php');
$MsgErr = "";
// Now we check if the data was submitted, isset() function will check if the data exists.
if (isset($_POST['horse_name'])) {

        // Make sure the submitted registration values are not empty.
        if (empty($_POST['horse_name'])) {
            // One or more values are empty.
            $MsgErr = $MsgErr . 'Please complete the registration form<br>';
        }

        if (!filter_var($_POST['horse_name'], FILTER_VALIDATE_EMAIL)) {
            $MsgErr = $MsgErr . 'Name is not valid!<br>';
        }

        if (preg_match('/[A-Za-z0-9]+/', $_POST['horse_name']) == 0) {
            $MsgErr = $MsgErr . 'Horse Name is not valid!<br>';
        }

        if (preg_match('/[0-9]+/', $_POST['horse_weight']) == 0) {
            $MsgErr = $MsgErr . 'Horse Weight is not valid!<br>';
        }

        if ($_POST['horse_weight'] >200 || $_POST['horse_weight'] < 1000) {
            $MsgErr = $MsgErr . 'Horse Weight must be between 100 and 1000 !<br>';
        }

    if($MsgErr==""){
    // We need to check if the account with that username exists.
    if ($stmt = $conn->prepare('SELECT horse_id FROM horse WHERE horse_name = :horsename')) {
        // Bind parameters (s = string, i = int, b = blob, etc), hash the password using the PHP password_hash function.
        $stmt->bindParam(':horsename', $_POST['horse_name']);
        $stmt->execute();
        //$stmt->store_result();
        // Store the result so we can check if the account exists in the database.
        if ($stmt->rowCount() > 0) {
            // Email already exists
            echo 'Horse exists, please choose another name!';
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
        $stmt->bindParam(':horsename', $_POST['horse_name']);
        $stmt->bindParam(':horsedob', $_POST['horse_dob']);
        $stmt->bindParam(':horseweight', $_POST['horse_weight']);
        $stmt->bindParam(':stableid', $_POST['stable_id']);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

    }

}
?>