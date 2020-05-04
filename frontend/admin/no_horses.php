<?php 
    include('../../global/serverconnectionafterlogin.php');
    $raceid = $_GET['raceid'];

    $list = $conn->prepare("SELECT no_horses FROM race  WHERE race_id = $raceid");
    $list->execute();
    while ($row_list = $list->fetch(PDO::FETCH_ASSOC))
    echo $row_list['no_horses'];
?>