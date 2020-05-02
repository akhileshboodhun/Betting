<?php 
include('../../global/serverconnectionafterlogin.php');

    if ($stmt = $conn->prepare('INSERT INTO race (race_name, date_time, distance, no_horses) VALUES(:racename, :racedatetime, :dist, :numhorses)')){
        $stmt->bindParam(':racename', $POST_['race_name']);
        $stmt->bindParam(':racedatetime', $POST_['date_time']);
        $stmt->bindParam(':dist', $POST_['distance']);
        $stmt->bindParam(':numhorses', $POST_['no_horses']);
        $stmt->execute();
        echo 'Success';
        //echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    }else{
        echo 'Could not prepare statement!';
    }

?>