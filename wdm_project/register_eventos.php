<?php
session_start();
require("./database_conn.php");
if(isset($_SESSION["user"])){
    if(isset($_POST["eventId"])){
    $event = explode("_",$_POST["eventId"]);
    $eventId = filter_var($event[1], FILTER_SANITIZE_STRING);
    $eventType = filter_var($event[0], FILTER_SANITIZE_STRING);
    }
    else {
        echo "event Id was not set";
        exit;
    }
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $eventId = $conn->real_escape_string($eventId);
    $eventType = $conn->real_escape_string($eventType);
    if($eventType == "reg"){
        $stmt = $conn->prepare("INSERT INTO Event_registrations (login_id, event_id) VALUES (?,?)");
        $stmt->bind_param("ss", $_SESSION["user"], $eventId);
        if ($stmt->execute() === TRUE) {
            mysqli_close($conn);
            die();
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    if($eventType == "unreg"){
        $stmt = $conn->prepare("DELETE FROM Event_registrations WHERE login_id=(?) AND event_id=(?)");
        $stmt->bind_param("ss", $_SESSION["user"], $eventId);
        if ($stmt->execute() === TRUE) {
            mysqli_close($conn);
            die();
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
} else{
    echo "Please login!!";
    exit;
}
?>