<?php
session_start();
require("./database_conn.php");
if(isset($_SESSION["user"]) and $_SESSION["role"] == "admin"){
    if(isset($_POST["description"])){
    $description = filter_var($_POST["description"], FILTER_SANITIZE_STRING);
    }
    else {
        echo "description was not set";
        exit;
    }
    if(isset($_POST["time"])){
    $time = filter_var($_POST["time"], FILTER_SANITIZE_STRING);
    }
    else {
        echo "time was not set";
        exit;
    }
    if(isset($_POST["date"])){
    $date = filter_var($_POST["date"], FILTER_SANITIZE_STRING);
    }
    else {
        echo "date was not set";
        exit;
    }
    if(isset($_POST["location"])){
    $location = filter_var($_POST["location"], FILTER_SANITIZE_STRING);
    }
    else {
        echo "location was not set";
        exit;
    }
    if(isset($_POST["eventId"])){
    $event_id = filter_var($_POST["eventId"], FILTER_SANITIZE_STRING);
    }
    else {
        echo "event id was not set";
        exit;
    }
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $description = $conn->real_escape_string($description);
    $time = $conn->real_escape_string($time);
    $date = $conn->real_escape_string($date);
    $location = $conn->real_escape_string($location);
    $event_id = $conn->real_escape_string($event_id);
    $stmt = $conn->prepare("UPDATE Events SET Event_description = ?, Event_time = ?, Event_date = ?,Event_location = ? WHERE Event_Id = ?");
    $stmt->bind_param("sssss", $description, $time, $date, $location, $event_id);
    if ($stmt->execute() === TRUE) {
        mysqli_close($conn);
        die();
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else{
    echo "Please login!!";
    exit;
}
?>