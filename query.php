<?php
include('server.php');
try{
    $sql = "INSERT INTO user
    VALUES (154, 'maow', 'joemama@example.com','xd')";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
}
catch(PDOException $e){
    echo "<br><br><br>" . $sql . "<br>" . $e->getMessage();
}
?>