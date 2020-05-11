<?php
require("./database_conn.php");
if(isset($_POST["fname"])){
    $fname = filter_var($_POST["fname"], FILTER_SANITIZE_STRING);
}
else {
    echo "full name is required";
    exit();
}

if(isset($_POST["email_id"])){
    $email_id = filter_var($_POST["email_id"], FILTER_SANITIZE_EMAIL);
}
else {
    echo "email_id is required";
    exit();
}

if(isset($_POST["telephone"])){
    $telephone = filter_var($_POST["telephone"], FILTER_SANITIZE_NUMBER_INT);
}
else{
    echo "telephone is required";
    exit();
}

if(isset($_POST["city"])){
    $city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
}
else{
    echo "city is required";
    exit();
}


/* cleaning the input to make it type safe */
$fname = $conn->real_escape_string($fname);
$email_id = $conn->real_escape_string($email_id);
$telephone = $conn->real_escape_string($telephone);
$city = $conn->real_escape_string($city);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$sql = $conn->prepare("INSERT INTO Event_reminders (fullname,email_id,telephone_num,city)
VALUES (?,?,?,?)");
$sql->bind_param("ssss", $fname, $email_id, $telephone, $city);

if ($sql->execute() === TRUE) {
    echo "Success!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>