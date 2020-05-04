<?php
	require_once "../../global/serverconnectionafterlogin.php";
	
	$sQuery = "SELECT * from race";
	
	$result = $conn->query($sQuery);
	$root= "races";
	
	$dom = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\" ?><{$root}></{$root}>");
	
	while($row = $result->fetch())
	{
		$race_node = $dom->addChild('race');
		
		$race_id = $row['race_id'];
		$race_node->addAttribute( "race_id", $race_id); 
		
		$race_name = $row['race_name'];
		$race_node->addChild('race_name', $race_name);
		
		
		$race_date = $row['date_time'];
		$race_node->addChild('date_time', $race_date);
		
		$race_distance = $row['distance'];
		$race_node->addChild('distance', $race_distance );

		$race_no_horses = $row['no_horses'];
		$race_node->addChild('no_horses', $race_no_horses );

		
	}//end while
		
	
	//Inform the browser that we are sending xml content	
	header('Content-Type: application/xml');
	print $dom->asXML();
	
?>