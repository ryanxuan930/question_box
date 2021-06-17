<?php
include("database.php");
$content = $_POST["data"];
$conn->select_db("twitter");
$time = date("Y-m-d H:i:s");
$stmt = $conn->prepare("INSERT INTO data (timestamp, question) VALUES (?,?)");
$stmt->bind_param("ss",$time,$content);
$stmt->execute();
if($conn->error){
    echo $conn->error;
}else{
    echo "已送出問題～";
}
?>