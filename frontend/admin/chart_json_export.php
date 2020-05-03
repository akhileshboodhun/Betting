<?php
for($i=1; $i<=date("d"); $i++){

$json_array['labels'][] = $i;

$json_array['series'][] = intval($clicks[$i]);

}
echo json_encode($json_data);

?>