<?php

$username = "racreators1"; 
$password = "b=pNb9i3{W#4";
$server = 'localhost';
$database = 'Lokeshdidwania1';
$port = '3306';

$conn = mysqli_connect($server, $username, $password, $database, $port);  


if ($conn) {
?>
<?php
} else {
   echo "No Connection";
   die("No Connection" . mysqli_connect_error());
}

?>