<?php
require("./database_conn.php");

if(isset($_POST["firstname"])){
    $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
}
else {
    echo "firstname is required";
    exit();
}

if(isset($_POST["middlename"])){
    $middle_name = filter_var($_POST["middlename"], FILTER_SANITIZE_STRING);
}

if(isset($_POST["lastname"])){
    $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
}
else {
    echo "lastname is required";
    exit();
}

if(isset($_POST["username"])){
    $login_id = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
else{
    echo "username is required";
    exit();
}

if(isset($_POST["mailId"])){
    $email = filter_var($_POST["mailId"], FILTER_SANITIZE_EMAIL);
}
else{
    echo "email is required";
    exit();
}

if(isset($_POST["password"])){
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
}
else{
    echo "password is required";
    exit();
}

if(isset($_POST["password_again"])){
    $password_again = filter_var($_POST["password_again"], FILTER_SANITIZE_STRING);
}
else{
    echo "password is required";
    exit();
}

if(isset($_POST["recoveryEmail"])){
    $recovery_email = filter_var($_POST["recoveryEmail"], FILTER_SANITIZE_EMAIL);
    if(is_null($recovery_email)){
        echo "recovery email is required";
        exit();
    } 
}

if(isset($_POST["location"])){
    $location = filter_var($_POST["recoveryEmail"], FILTER_SANITIZE_EMAIL);
}
else{
    echo "location is required";
    exit();
}

/* cleaning the input to make it type safe */
$firstname = $conn->real_escape_string($firstname);
$middle_name = $conn->real_escape_string($middle_name);
$lastname = $conn->real_escape_string($lastname);
$login_id = $conn->real_escape_string($login_id);
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);
$password_again = $conn->real_escape_string($password_again);
$recovery_email = $conn->real_escape_string($recovery_email);
$location = $conn->real_escape_string($location);
$role = "member";

$time = time();
$salt = hash_hmac('sha256', $time,$password);
$passwordHash = sha1($password.$salt);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// prepare and bind
$sql = $conn->prepare("INSERT INTO UserDetails (login_id,firstname,middle_name,lastname,location,password,salt,role,email,recovery_email)
VALUES (?,?,?,?,?,?,?,?,?,?)");
$sql->bind_param("ssssssssss", $login_id, $firstname, $middle_name, $lastname, $location, $passwordHash, $salt, $role,$email, $recovery_email);

if ($sql->execute() === TRUE) {
    $server_email = "vbp2538@vbp2538.uta.cloud";
    $subject = 'Gracias por contactar : '.$asunto;
    $message = 'Enhorabuena! Al crear su nueva cuenta con nosotros'."\n".'El ID de tu cuenta es: '.$login_id;
    $headers = 'From: '.$server_email. "\r\n" .
    'Reply-To: '.$server_email. "\r\n";
    mail($email, $subject, $message, $headers);
    echo "New username created successfully!!";
} else {
    echo "Error: <br>" . $conn->error;
}

$conn->close();
?>