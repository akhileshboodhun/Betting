<?php 
include('../../global/serverconnectionafterlogin.php');

    // Username doesnt exists, insert new account
    if ($stmt = $conn->prepare('INSERT INTO race (race_name, race_datetime, race_dist, race_numhorses) VALUES (:racename, :racedatetime, :racedist, :racenumhorses)')) {
        $stmt->bindParam(':racename', $_POST['race_name']);
        $stmt->bindParam(':racedatetime', $_POST['race_datetime']);
        $stmt->bindParam(':racedist', $_POST['race_dist']);
        $stmt->bindParam(':racenumhorses', $_POST['race_numhorses']);
        $stmt->execute();
        echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

?>