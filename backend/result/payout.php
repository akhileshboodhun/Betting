<?php 
include('../../global/serverconnectionafterlogin.php');
$select_horse_array2 = $_POST['select_horses2'];
$select_rank_array2 = $_POST['select_rank2'];
$select_size = count($select_horse_array2);

//Add to results
for($i=0;$i<$select_size;$i++){
    if ($stmt = $conn->prepare('INSERT INTO results (race_id, horse_id, rank) VALUES(:raceid, :horseid, :rank)')){
        $stmt->bindParam(':raceid', $_POST['race_id']);
        $stmt->bindParam(':horseid', $select_horse_array2[$i]);
        $stmt->bindParam(':rank', $select_rank_array2[$i]);
        $stmt->execute();
        echo 'Success0';
    // echo "<script>location.href = 'http://localhost/betting/frontend/admin/admindashboard.php';</script>";
    }else{
        echo 'Could not prepare statement!';
    }
}

//Select all normal_user for selected race_id stored in bets
$s_squery_user = "  SELECT user_id
                    FROM bets
                WHERE race_id = :raceid
                AND PayoutFlag = 0;  

";
if ($stmt = $conn->prepare($s_query_user)){
    $stmt->bindParam(':raceid', $_POST['race_id']);
    $stmt->execute();
    echo 'Success1';
}else{
    echo 'Could not prepare statement2!';
}
$uid2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
$uid = $uid2['user_id'];
$uid_size = count($uid);


/*
//Find no_horses in race for race_id
$s_squery_no_horses = "  SELECT no_horses
                    FROM race
                WHERE race_id = :raceid;  

";
if ($stmt = $conn->prepare($s_query_no_horses)){
    $stmt->bindParam(':raceid', $_POST['race_id']);
    $stmt->execute();
    echo 'Success1';
}else{
    echo 'Could not prepare statement2!';
}
$hcount = $stmt->fetchAll(PDO::FETCH_ASSOC);
$no_horses = $hcount['no_horses'];
*/

//get bet odds and user from vw_bets_race_rank_specific_horses
$s_query_bets = "   SELECT userid, bet_amount, odds, rank
                    FROM vw_bets_race_rank_specific_horses
                    WHERE race_id = :raceid
                    AND PayoutFlag = 0;
";
if ($stmt = $conn->prepare($s_query_bets)){
    $stmt->bindParam(':raceid', $_POST['race_id']);
    $stmt->execute();
    echo 'Success1';
}else{
    echo 'Could not prepare statement2!';
}
$bets_rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
$bets_rs_userid = $bets_rs['userid'];
$bets_rs_amt = $bets_rs['bet_amount'];
$bets_rs_odds = $bets_rs['odds'];
$bets_rs_rank = $bets_rs['rank'];
$bets_rs_hcount = $bets_rs['no_horses'];
$bets_rs_count = count($bets_rs);
$receiveamount = array();
for($i=0;$i<$bets_rs_count;$i++){
$calc_receive = $bets_rs_amt[$i] * (0.5) * ($bets_rs_hcount[$i] / $bets_rs_rank[$i]) * $bets_rs_odds[$i];
    array_push($receiveamount, $calc_receive);
}



for($i=0;$i<$uid_size;$i++){
//Payout to normal_user
$s_deduct = "   UPDATE normal_user
                SET balance = balance + :receiveamount
                WHERE user_id = :userid;  

";
if ($stmt = $conn->prepare($s_deduct)){
    $stmt->bindParam(':userid', $uid[$i]);
    $stmt->bindParam(':receiveamount', $receiveamount[$i]);
    $stmt->execute();
    echo 'Success2';
}else{
    echo 'Could not prepare statement2!';
}
}

foreach($uid as $u_id){
    //Setting Payout to 1 in bets
    $s_setting = "   UPDATE bets
                    SET PayoutFlag = 1
                    WHERE user_id = :userid
                    AND race_id = :raceid;  
    
    ";
    if ($stmt = $conn->prepare($s_setting)){
        $stmt->bindParam(':userid', $u_id);
        $stmt->bindParam(':raceid', $_POST['race_id']);
        $stmt->execute();
        echo 'Success3';
    }else{
        echo 'Could not prepare statement2!';
    }
    }




?>