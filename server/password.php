<?php
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
include("database.php");
$conn->select_db("twitter");
$stmt = $conn->prepare("UPDATE admin SET password=? WHERE account=?");
$password = password_hash($_POST["password"],PASSWORD_DEFAULT);
$account = $_POST["account"];
$stmt->bind_param("ss",$password,$account);
$stmt->execute();
if($conn->error){
    echo $conn->error;
}else{
    echo "已變更密碼";
}
?>