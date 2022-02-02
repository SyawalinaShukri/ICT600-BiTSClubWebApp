<?php
// this is database connection!!! 

$servername = 'localhost';
$username = 'id18375401_bits2021';
$password = 'BiTSMembership2021_';
$dbname = 'id18375401_bits';

$db = new mysqli($servername,$username,$password,$dbname);

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

?>