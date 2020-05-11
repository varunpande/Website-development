<?php
session_start();
require("./database_conn.php");

if(isset($_POST["username"])){
    $userid = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
else {
    echo "username is required";
    exit();
}

if(isset($_POST["password"])){
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
}
else {
    echo "password is required";
    exit();
}

$userid = $conn->real_escape_string($userid);
$password = $conn->real_escape_string($password);

$sql = "SELECT salt FROM UserDetails WHERE login_id LIKE '".$userid."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $salt = $row["salt"];
    }   
}
else {
    echo "no such user";
}

$password = sha1($_POST['password'].$salt);

$sql = "SELECT login_id,role FROM UserDetails WHERE password LIKE '".$password."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $_SESSION["user"] = $row["login_id"];
        $_SESSION["role"] = $row["role"];
        if($_SESSION["role"] == "admin"){
            echo "<script> location.href='admin_ui.php'; </script>";
            exit;  
        }
        if($_SESSION["role"] == "member"){
            echo "<script> location.href='eventos.php'; </script>";
            exit;
        }
        
    }   
}
else {
    echo "no such user";
}

$conn->close();
$result->free();
?>