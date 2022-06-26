<?php
define('DB_SERVER','localhost');
define('DB_USER','id17436211_root');
define('DB_PASS' ,'Makayath@0101');
define('DB_NAME', 'id17436211_foodmania');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

?>

