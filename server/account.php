<?php
$account = $_POST["account"];
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
include("dbclass.php");
$db = new database("twitter");
$db->table("admin");
$result = $db->select_where(0,"account = '{$account}'");
$array = array();
while($row = $result->fetch_assoc()){
    $array["account"] = $row["account"];
    $array["name"] = $row["name"];
}
$obj = json_encode($array);
echo $obj;
?>