<?php
$username = "root";
$password = "";
$server = 'localhost';
$db = 'users';

$conn = mysqli_connect($server, $username, $password, $db);

if(!$conn){
    die("Error". mysqli_connect_error());
}
?>