<?php
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
$dbserver="127.0.0.1";
$dbusername="twitter";
$dbpassword="K0OMT4lftY5Ue7ki";
$conn = new mysqli($dbserver, $dbusername, $dbpassword);
//Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("set names utf8");
date_default_timezone_set('Asia/Taipei');
?>