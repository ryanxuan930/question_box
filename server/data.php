<?php
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
include("database.php");
if(!isset($_POST["name"])){
    echo "請填寫暱稱！";
}else if(!isset($_POST["data"])){
    echo "請填寫問題！";
}else{
    $content = $_POST["data"];
    $name = $_POST["name"];
}
$conn->select_db("twitter");
$time = date("Y-m-d H:i:s");
$stmt = $conn->prepare("INSERT INTO data (timestamp, name, question) VALUES (?,?,?)");
$stmt->bind_param("sss",$time,$name,$content);
$stmt->execute();
if($conn->error){
    echo $conn->error;
}else{
    echo "已送出問題～";
}
?>