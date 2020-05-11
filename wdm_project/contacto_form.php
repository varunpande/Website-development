<?php
require("./database_conn.php");

if(isset($_POST["TuNombre"])){
    $Tu_Nombre = filter_var($_POST["TuNombre"], FILTER_SANITIZE_STRING);
}
else{
    echo "Name not provided!";
    exit;
}

if(isset($_POST["TuCorrero"])){
    $Tu_Correro = filter_var($_POST["TuCorrero"], FILTER_SANITIZE_EMAIL);
}
else{
    echo "email id not provided!";
    exit;
}

if(isset($_POST["Asunto"])){
    $asunto = filter_var($_POST["Asunto"], FILTER_SANITIZE_STRING);
}
else{
    echo "Affair subject not provided!";
    exit;
}

if(isset($_POST["Asunto_desc"])){
    $asunto_desc = filter_var($_POST["Asunto_desc"], FILTER_SANITIZE_STRING);
}
else{
    echo "Affair description not provided!";
    exit;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$Tu_Nombre = $conn->real_escape_string($Tu_Nombre);
$Tu_Correro = $conn->real_escape_string($Tu_Correro);
$asunto = $conn->real_escape_string($asunto);
$asunto_desc = $conn->real_escape_string($asunto_desc);

// prepare and bind
$sql = $conn->prepare("INSERT INTO Contacto_data(name,email_id,affair,affair_desc)
VALUES (?,?,?,?)");
$sql->bind_param("ssss", $Tu_Nombre, $Tu_Correro, $asunto, $asunto_desc);

if ($sql->execute() === TRUE) {
    echo "Contacto us succeeded!";
    $server_email = "vbp2538@vbp2538.uta.cloud";
    $subject = 'Gracias por contactar : '.$asunto;
    $message = 'Hemos recibido tu correo !'."\n".$asunto_desc.'"';
    $headers = 'From: '.$server_email. "\r\n" .
    'Reply-To: '.$server_email. "\r\n";
    mail($Tu_Correro, $subject, $message, $headers);
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>