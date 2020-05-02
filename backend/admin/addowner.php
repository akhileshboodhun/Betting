<?php 
include('../../global/serverconnectionafterlogin.php');

    if ($stmt = $conn->prepare('INSERT INTO owner (owner_name) VALUES(:ownername)')){
        $stmt->bindParam(':ownername', $_POST['owner_name']);
        $stmt->execute();
        echo 'Success';
       // echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    }else{
        echo 'Could not prepare statement!';
    }

?>