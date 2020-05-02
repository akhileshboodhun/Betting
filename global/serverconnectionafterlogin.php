<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = "Betting";
$conn = null;

try {
    $conn = new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully";
    }
catch(PDOException $e)
    {
    echo "An error occured while connecting, please refresh or signin again. " . $e->getMessage();
    }
?> 