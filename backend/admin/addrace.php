<?php 
include('../../global/serverconnectionafterlogin.php');
$select_horse_array = $_POST['select_horses'];
$select_jockey_array = $_POST['select_jockeys'];
$horse_array_size = count($select_horse_array);
    if ($stmt = $conn->prepare('INSERT INTO race (race_name, date_time, distance, no_horses) VALUES(:racename, :racedatetime, :dist, :numhorses)')){
        $stmt->bindParam(':racename', $_POST['race_name']);
        $stmt->bindParam(':racedatetime', $_POST['date_time']);
        $stmt->bindParam(':dist', $_POST['distance']);
        $stmt->bindParam(':numhorses', $horse_array_size);
        $stmt->execute();
        echo 'Success';
       // echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    }else{
        echo 'Could not prepare statement!';
    }

    $list = $conn->prepare("SELECT race_id FROM race WHERE race_name = :racename ");
    $list->bindParam(':racename',$_POST['race_name']);
    $list->execute();
    $rs= $list->fetch(PDO::FETCH_ASSOC);
    $raceid = $rs['race_id'];
    //echo $raceid;
    

    $testjockeyid=796;
    $testodd=200;
   /* foreach($select_horse_array as $s_horse){
        if ($stmt = $conn->prepare('INSERT INTO race_horse_jockey (race_id, horse_id, jockey_id, odd) VALUES(:raceid, :horseid, :jockeyid, :odd)')){
            $stmt->bindParam(':raceid', $raceid);
            $stmt->bindParam(':horseid', $s_horse);
            $stmt->bindParam(':jockeyid', $testjockeyid);
            $stmt->bindParam(':odd', $testodd);
            $stmt->execute();
            echo 'Success2';
        // echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
        }else{
            echo 'Could not prepare statement!';
        }
    }*/

    for($i=0; $i<$horse_array_size;$i++){
        if ($stmt = $conn->prepare('INSERT INTO race_horse_jockey (race_id, horse_id, jockey_id) VALUES(:raceid, :horseid, :jockeyid)')){
            $stmt->bindParam(':raceid', $raceid);
            $stmt->bindParam(':horseid', $select_horse_array[$i]);
            $stmt->bindParam(':jockeyid', $select_jockey_array[$i]);
            $stmt->execute();
            echo 'Success2';
        // echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
        }else{
            echo 'Could not prepare statement!';
        }
    }



?>