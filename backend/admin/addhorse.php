<?php 
include('../../global/serverconnectionafterlogin.php');

    // Username doesnt exists, insert new account
    if ($stmt = $conn->prepare('INSERT INTO horse (horse_name, horse_dob, horse_weight, stable_id) VALUES (:horsename, :horsedob, :horseweight,:stableid);')) {
        $stmt->bindParam(':horsename', $_POST['horse_name']);
        $stmt->bindParam(':horsedob', $_POST['horse_dob']);
        $stmt->bindParam(':horseweight', $_POST['horse_weight']);
        $stmt->bindParam(':stableid', $_POST['stable_id']);
        //$stmt->bindParam(':ownerid', $_POST['owner_id']);
        $stmt->execute();

        /*$stmt2 = $conn->prepare("SELECT horse_id FROM horse WHERE horse_name = :horsename ;");
        $stmt2->bindParam(':horsename', $_POST['horse_name']);
        $stmt2->execute();
        $hid = $stmt2->fetch(PDO::FETCH_ASSOC);
        $stmt3 = $conn->prepare("INSERT INTO horse_owner (horse_id, owner_id) VALUES (:$hid, :ownerid);");
        $stmt3->bindParam(":$hid", $_POST['horse_id']);
        $stmt3->bindParam(':ownerid', $_POST['owner_id']);
        $stmt3->execute();*/

         echo 'Success '.$hid;                      
        //echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

?>