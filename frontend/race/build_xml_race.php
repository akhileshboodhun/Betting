<?php
	
	require_once "../../global/serverconnectionafterlogin.php";
	
    $sQuery = "SELECT * FROM race";
	$result = $conn->query($sQuery);
	// create DomDocument object
    $dom = new DOMDocument( "1.0");
    
    // add root node
     $root = $dom->createElement('races');
     while($row = $result->fetch())//for races 1,2,3...
     {
        $race_node = $dom->createElement('race');
        $race_id = $row['race_id'];
        $race_node->setAttribute( "race_id", $race_id); 
        
        $race_name = $row['race_name'];
		$race_name_node = $dom->createElement('race_name', $race_name);
		$race_node->appendChild($race_name_node);
		
		$race_date_time = $row['date_time'];
		$race_date_time_node = $dom->createElement('date_time', $race_date_time);
		$race_node->appendChild($race_date_time_node);
		
		$race_distance = $row['distance'];
		$race_distance_node = $dom->createElement('distance', $race_distance);
		$race_node->appendChild($race_distance_node);
		
		$race_no_horses = $row['no_horses'];
		$race_no_horses_node = $dom->createElement('no_horses', $race_no_horses);
        $race_node->appendChild($race_no_horses_node);

        

       
		
        $root->appendChild($race_node);
     }//end while

    
     $dom->appendChild($root);



	function libxml_display_error($error)
	{
		$return = "<br/>\n";
		switch ($error->level) {
			case LIBXML_ERR_WARNING:
				$return .= "<b>Warning $error->code</b>: ";
				break;
			case LIBXML_ERR_ERROR:
				$return .= "<b>Error $error->code</b>: ";
				break;
			case LIBXML_ERR_FATAL:
				$return .= "<b>Fatal Error $error->code</b>: ";
				break;
		}
		$return .= trim($error->message);
		if ($error->file) {
			$return .=    " in <b>$error->file</b>";
		}
		$return .= " on line <b>$error->line</b>\n";

		return $return;
	}

	
	function libxml_display_errors() {
		$errors = libxml_get_errors();
		foreach ($errors as $error) {
			print libxml_display_error($error);
		}
		libxml_clear_errors();
	}

	// Enable user error handling
	libxml_use_internal_errors(true);
	//We convert the XML into a DOMDocument object for schema validation purposes
	$doc = new DOMDocument("1.0");
	$doc->loadXML($dom->asXML()); 
	if (!$doc->schemaValidate('build_xml_race.xsd')) {
   		 print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
    	libxml_display_errors();
	}
	else
	{
		//Inform the browser that we are sending xml content	
		header('Content-Type: application/xml');
		$dom->formatOutput = true;
		$dom->save('C:\xampp\htdocs\DOM_XML_Creation.xml');
		print $dom->asXML();
	}




	
?>