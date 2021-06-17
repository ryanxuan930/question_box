<?php
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
include("database.php");
$conn->select_db("twitter");
$stmt = $conn->prepare("UPDATE admin SET name=? WHERE account=?");
$name = $_POST["name"];
$account = $_POST["account"];
$stmt->bind_param("ss",$name,$account);
$stmt->execute();
if($conn->error){
    echo $conn->error;
}else{
    echo "已變更名稱";
}
?>