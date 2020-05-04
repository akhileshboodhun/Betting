<?php
for($i=1; $i<=date("d")+10; $i++){

$json_array['labels'][] = $i;

$json_array['series'][] = $i;

}
echo json_encode($json_array);

?>