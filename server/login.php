<?php
header("Access-Control-Allow-Origin: https://ryanxuan930.github.io");
include("database.php");
$conn->select_db("twitter");
$account = $_POST["account"];
$password = $_POST["password"];
$stmt = $conn->prepare("SELECT * FROM admin WHERE account=?");
$stmt->bind_param("s",$account);
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows){
    while($row = $result->fetch_assoc()){
        $hash = $row["password"];
    }
    if(password_verify($password,$hash)){
        header("Location: https://ryanxuan930.github.io/question_box/admin/main.html");
    }else{
        echo "<script>alert('密碼錯誤');</script>";
        header("Location: https://ryanxuan930.github.io/question_box/admin/login.html");
    }
}else{
    echo "<script>alert('帳號錯誤');</script>";
    header("Location: https://ryanxuan930.github.io/question_box/admin/login.html");
}
?>