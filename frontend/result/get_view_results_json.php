<?php
use Opis\JsonSchema\{
    Validator, ValidationResult, ValidationError, Schema
};

require '../../vendor/autoload.php';
    include ('../../global/serverconnectionafterlogin.php');
    $stmt = $conn->prepare("SELECT * FROM vw_results WHERE race_id = :raceid ORDER BY rank ASC;");
    $stmt->bindParam(':raceid',$_GET['raceidjson']);
    $stmt->execute();
    $row_stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
   
   $data = json_encode($row_stmt,JSON_NUMERIC_CHECK);
   // echo $data;
   
   $data1 = json_decode($data);
   
   
    $schema = Schema::fromJsonString(file_get_contents('http://localhost/betting/JSONSchema_Simple.json'));

   $validator = new Validator();

 /** @var ValidationResult $result */
 $result = $validator->schemaValidation($data1, $schema);

 if ($result->isValid()) {
     //echo '$data is valid', PHP_EOL;
     header('Content-Type: application/json'); 
     echo $data;
 } else {
     /** @var ValidationError $error */
     $error = $result->getFirstError();
     echo '$data is invalid', PHP_EOL;
     echo "Error: ", $error->keyword(), PHP_EOL;
     echo json_encode($error->keywordArgs(), JSON_PRETTY_PRINT), PHP_EOL;
 }




?>