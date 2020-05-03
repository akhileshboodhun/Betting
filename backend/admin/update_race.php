<?php
$select_horse_array = $_POST['select_horses'];

$race_id = $_POST['race_id'];
$race_name = $_POST['race_name'];
$race_date_time = $_POST['date_time'];
$race_distance = $_POST['distance'];
$horse_array_size = count($select_horse_array);


//updating first table 'race'

$s_update = "   UPDATE  race
                SET race_name = :racename,
                    date_time = :racedatetime,
                    distance = :dist,
                    no_horses = :numhorses
                WHERE race_id = :raceid;
";


if ($stmt = $conn->prepare($s_update){
    $stmt->bindParam(':racename', $race_name);
    $stmt->bindParam(':racedatetime', $race_date_time);
    $stmt->bindParam(':dist', $race_distance);
    $stmt->bindParam(':numhorses', $horse_array_size);
    $stmt->bindParam(':raceid', $race_id);
    $stmt->execute();
    echo 'Success';
}else{
    echo 'Could not prepare statement1!';
}

//deleted inconsistent table 'horse_race'
$s_delete = "DELETE FROM horse_race WHERE race_id = :raceid";
if ($stmt = $conn->prepare($s_delete){
    $stmt->bindParam(':raceid', $race_id);
    $stmt->execute();
    echo 'Success2';
}else{
    echo 'Could not prepare statement2!';
}


//replaced second table 'horse_race' with a new updated one

foreach($select_horse_array as $s_horse){
    if ($stmt = $conn->prepare('INSERT INTO horse_race (race_id, horse_id) VALUES(:raceid, :horseid)')){
        $stmt->bindParam(':raceid', $race_id);
        $stmt->bindParam(':horseid', $s_horse);
        $stmt->execute();
        echo 'Success3';
    }else{
        echo 'Could not prepare statement3!';
    }
}













?>