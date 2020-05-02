<?php 
include('../../global/serverconnectionafterlogin.php');

    if ($stmt = $conn->prepare('INSERT INTO stable (stable_name) VALUES(:stablename)')){
        $stmt->bindParam(':stablename', $_POST['stable_name']);
        $stmt->execute();
        echo 'Success';
       // echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    }else{
        echo 'Could not prepare statement!';
    }

?>