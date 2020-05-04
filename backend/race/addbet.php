<?php 
include('../../global/serverconnectionafterlogin.php');
//Deduct from normal_user
$s_deduct = "   UPDATE normal_user
                SET balance = balance - :betamount
                WHERE user_id = :userid;  

";
if ($stmt = $conn->prepare($s_deduct)){
    $stmt->bindParam(':userid', $_POST['user_id']);
    $stmt->bindParam(':betamount', $_POST['bet_amount']);
    $stmt->execute();
    echo 'Success0';
}else{
    echo 'Could not prepare statement2!';
}

    // Insert New Bet
    if ($stmt = $conn->prepare("INSERT INTO bets (race_id, horse_id, userid, bet_odd, bet_amount) VALUES (:raceid, :horseid, :userid,:betodd,:betamount);")) {
        $stmt->bindParam(':raceid', $_POST['race_id']);
        $stmt->bindParam(':horseid', $_POST['horse_id']);
        $stmt->bindParam(':userid', $_POST['user_id']);
        $stmt->bindParam(':betodd', $_POST['bet_odd']);
        $stmt->bindParam(':betamount', $_POST['bet_amount']);
        $stmt->execute();
         echo 'Success1';                      
    } else {
        // Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
        echo 'Could not prepare statement!';
    }

    //update inconsistent table 'race_horse_jockey' for current horse
$s_update = "   UPDATE race_horse_jockey
                SET odds = :newodds
                WHERE race_id = :raceid
                AND   horse_id = :horseid

;";

if ($stmt = $conn->prepare($s_update)){
    $stmt->bindParam(':raceid', $_POST['race_id']);
    $stmt->bindParam(':horseid', $_POST['horse_id']);
    $stmt->bindParam(':newodds', $_POST['bet_odd']);
    $stmt->execute();
    echo 'Success2';
}else{
    echo 'Could not prepare statement2!';
}

//update inconsistent table 'race_horse_jockey' for other horses
$s_update = "   UPDATE race_horse_jockey
                SET odds = odds + :new_other_odds_inc
                WHERE race_id = :raceid
                AND   horse_id <> :horseid

;";

if ($stmt = $conn->prepare($s_update)){
    $stmt->bindParam(':raceid', $_POST['race_id']);
    $stmt->bindParam(':horseid', $_POST['horse_id']);
    $stmt->bindParam(':new_other_odds_inc', $_POST['other_odd_inc']);
    $stmt->execute();
    echo 'Success3';
}else{
    echo 'Could not prepare statement3!';
}



?>