<?php 
include('../../global/serverconnectionafterlogin.php');
    
    $usrid=155;
    echo $usrid;
    // Username doesnt exists, insert new account
    if ($stmt = $conn->prepare("INSERT INTO bets (race_id, horse_id, userid, bet_odd, bet_amount) VALUES (:raceid, :horseid, :userid,:betodd,:betamount);")) {
        $stmt->bindParam(':raceid', $_POST['race_id']);
        $stmt->bindParam(':horseid', $_POST['horse_id']);
        $stmt->bindParam(':userid', $_POST['user_id']);
        $stmt->bindParam(':betodd', $_POST['bet_odd']);
        $stmt->bindParam(':betamount', $_POST['bet_amount']);
        $stmt->execute();
         echo 'Success';                      
        //echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

?>