<?php
session_start();
require("./database_conn.php");
if(isset($_SESSION["user"]) and $_SESSION["role"] == "admin"){
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
    $event_id = $conn->real_escape_string($event_id);
    $stmt = $conn->prepare("DELETE FROM Events WHERE Event_Id = ?");
    $stmt->bind_param("s", $event_id);
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