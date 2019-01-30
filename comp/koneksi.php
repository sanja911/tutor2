<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbm = "tutor";

$conn = mysql_connect($host, $user, $pass);
if ($conn){
    $buka = mysql_select_db($dbm);
    if (!$buka){
        die ("database tidak dapat dibuka");
    }
}else {
    die("Server MYSQL tidak terhubung");
}
?>