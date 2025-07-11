<?php

$server="localhost";
$benuzer="root";
$passwort="";
$dbname="benutzerDatabase";

$conn = new mysqli($server, $benuzer, $passwort, $dbname);

if($conn->connect_error){
    die ("Verbindung fehlgeschlage:" . $conn->connect_error);
}

?>