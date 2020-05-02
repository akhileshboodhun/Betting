<?php 
include('../../global/server.php');

    // Username doesnt exists, insert new account
    if ($stmt = $conn->prepare('INSERT INTO horse (horse_name, horse_dob, horse_weight, stable_id) VALUES (:horsename, :horsedob, :horseweight,:stableid)')) {
        $stmt->bindParam(':horsename', $_POST['horse_name']);
        $stmt->bindParam(':horsedob', $_POST['horse_dob']);
        $stmt->bindParam(':horseweight', $_POST['horse_weight']);
        $stmt->bindParam(':stableid', $_POST['stable_id']);
        $stmt->execute();
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

?>