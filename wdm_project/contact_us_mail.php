<?php
require("./database_conn.php");
if(isset($_POST["conemailid"])){
    $email = filter_var($_POST["conemailid"], FILTER_SANITIZE_EMAIL);
}
else{
    echo "email id not provided!";
    exit;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $conn->real_escape_string($email);

// prepare and bind
$sql = $conn->prepare("INSERT INTO Contact_us_ref(user_email)
VALUES (?)");
$sql->bind_param("s", $email);

if ($sql->execute() === TRUE) {
    echo "Contact us success!";
    $server_email = "vbp2538@vbp2538.uta.cloud";
    $subject = 'Gracias por contactar';
    $message = 'Hemos recibido tu correo !';
    $headers = 'From: '.$server_email. "\r\n" .
    'Reply-To: '.$server_email. "\r\n";
    mail($email, $subject, $message, $headers);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>