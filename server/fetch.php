<?php
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
include("dbclass.php");
$db = new database("twitter");
$db->table("data");
$result = $db->select_all();
$array = array();
$i=0;
while($row = $result->fetch_assoc()){
    $array[$i]["name"] = $row["name"];
    $array[$i]["content"] = $row["question"];
    $array[$i]["time"] = $row["timestamp"];
    $array[$i]["answered"] = $row["answered"];
    $array[$i]["account"] = $row["account"];
    $i++;
}
$obj = json_encode($array);
echo $obj;
?>