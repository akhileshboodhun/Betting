<?php
include('../../global/serverconnectionafterlogin.php');
$query = "SELECT race_name as name , bet_amount as bet from bets,race where race.race_id=bets.race_id ";
$selection = $conn->prepare($query);
$selection->execute();
$counts = $selection->fetchAll();
foreach ($counts  as $chartinfo) {
$json_array['labels'][] = $chartinfo['name'];
$json_array['series'][] = $chartinfo['bet'];

}
echo json_encode($json_array);
