<?php
    include ('../../global/serverconnectionafterlogin.php');
    $stmt = $conn->prepare("SELECT * FROM vw_results WHERE race_id = :raceid ORDER BY rank ASC;");
    $stmt->bindParam(':raceid',$_GET['raceidjson']);
    $stmt->execute();
    $row_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
   echo json_encode($row_stmt);