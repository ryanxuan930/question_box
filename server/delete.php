<?php
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
include("dbclass.php");
$db = new database("twitter");
$id = $_POST["id"];
if(is_numeric($id)){
    $db->delete("id = {$id}");
    echo "已刪除問題";
}else{
    echo "輸入錯誤";
}
?>