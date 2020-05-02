<?php 
include('../../global/serverconnectionafterlogin.php');

    if ($stmt = $conn->prepare('INSERT INTO race (jockey_name, jockey_dob, jockey_weight) VALUES(:jockeyname, :jockeydob, :jockeyweight)')){
        $stmt->bindParam(':jockeyname', $_POST['jockey_name']);
        $stmt->bindParam(':jockeydob', $_POST['jockey_dob']);
        $stmt->bindParam(':jockeyweight', $_POST['jockey_weight']);
        $stmt->execute();
        echo 'Success';
       // echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    }else{
        echo 'Could not prepare statement!';
    }

?>