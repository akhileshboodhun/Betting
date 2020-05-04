<?php
	require_once '../../XML/Query2XML.php';

	require_once "../../global/serverconnectionafterlogin.php";
	//We use the factory design pattern to instantiate the object with the proper driver
	$query2xml = XML_Query2XML::factory($conn);
    $sQuery = "SELECT * FROM races";

	
@$dom = $query2xml->getXML(
    $sQuery,
    array(
  'rootTag' => 'races',
  'idColumn' => 'race_id',
  'rowTag' => 'race',
  'elements' => array(
      'race_name' => array(	'value' => 'race_name'	,	'attributes' => array('race_id' => 'race_id')	) ,
      'date_time' => 'date_time',
      'distance' => 'distance' ,
      'no_horses' => 'no_horses'
  )
)
);
    

  /*******************************   XML XSD VALIDATION   ******************************** */  
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
  
  if (!$dom->schemaValidate('build_xml_race.xsd')) {
          print '<b>DOMDocument::schemaValidate() Generated Errors!</b>';
      libxml_display_errors();
  }
  else
  {
	header('Content-Type: application/xml');
    $dom->formatOutput = true;
    $dom->save('C:\xampp\htdocs\Query2XML_Creation.xml');
	print $dom->saveXML();
  }
    
?>
