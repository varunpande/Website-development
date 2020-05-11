<?php
session_start();
require("./database_conn.php");
if(isset($_SESSION["user"]) and $_SESSION["role"] == "admin"){
if(isset($_POST["description"])){
    $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
}
else {
    echo "description is required";
    exit();
}

if(isset($_POST["time"])){
    $time = filter_var($_POST["time"], FILTER_SANITIZE_STRING);
}
else {
    echo "time is required";
    exit();
}

if(isset($_POST["date"])){
    $date = filter_var($_POST["date"], FILTER_SANITIZE_STRING);
}
else{
    echo "date is required";
    exit();
}

if(isset($_POST["location"])){
    $location = filter_var($_POST["location"], FILTER_SANITIZE_STRING);
}
else{
    echo "location is required";
    exit();
}


/* cleaning the input to make it type safe */
$description = $conn->real_escape_string($description);
$time = $conn->real_escape_string($time);
$date = $conn->real_escape_string($date);
$location = $conn->real_escape_string($location);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$sql = $conn->prepare("INSERT INTO Events (Event_description,Event_time,Event_date,Event_location)
VALUES (?,?,?,?)");
$sql->bind_param("ssss", $description, $time, $date, $location);

if ($sql->execute() === TRUE) {
    echo "<script> location.href='event_management.php'; </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
} else{
    echo "Please login!!";
    exit;
}
?>