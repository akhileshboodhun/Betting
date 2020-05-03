<?php
$current_odds = $rs['odds'];
$no_other_horses = count($row_stmt) -1;
$sum_odds = $s_odds['sum_odds'];
$sum_other_odds = $sum_odds - $current_odds;

$distribution = $sum_other_odds / ($no_other_horses * $no_other_horses);
$new_odds = $current_odds - $distribution;
//echo $new_odds . "<br>";

$each_other_odds_inc = ($distribution / $no_other_horses);

?>