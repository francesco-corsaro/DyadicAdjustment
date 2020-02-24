<?php
 

$servername = "localhost";
$username = " lucydreams";
$password ='' ;
$dbname = "my_lucydreams";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}else{
    $stato= "Connesso".'  ';
}

 ?>














