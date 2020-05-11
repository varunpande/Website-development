<?php
session_start();
require("./database_conn.php");
if(isset($_SESSION["user"]) and $_SESSION["role"] == "admin"){
    echo '<html lang="en">

<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/main.js"></script>
</head>

<body>
<header>
    <div id="head">
        <img id="icon" src="Images/i.jpg">
        <nav>
            <a class="nav_content" href="admin_ui.php">Home</a>/
            <a class="nav_content" href="admin_contact_list.php">To be contacted</a>/
            <a class="nav_content" href="event_management.php">Event Management</a>/
            <a class="nav_content" href="logout.php">Logout</a>
        </nav>
        <div id="mobile-menu">
        <select onchange="javascript:mobile_menu(this.options[this.selectedIndex].value)">
        <option value="#">Navigation</option>
        <option value="#">Home</option>
        <option value ="admin_contact_list.php">To be contacted</option>
        <option value="event_management.php">Event Management</option>
        <option value="logout.php">Logout</option></select>
        </div>
    </div>
</header>
    <div id="top-banner-container">
        <div id="overlay">
            <h1 class="title-name">Hi '. $_SESSION["user"].'</h1>
            <h5 class="title-name">INICIO &nbsp;&gt;&nbsp;Events</h5>
        </div>
    </div>
    <div id="wrapper">';
$sql = "SELECT * FROM Contact_us_ref";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div id="'.$row['contact_id'].'" class="contact_us">
                    <p> Email: '.$row['user_email'].'</p>
                    <p> Contact Date-Time: '.$row['contact_datetime'].'</p>
                </div>';
            }   
        }
        else {
            echo "<p> No recent contact to display! </p>";
        }
    echo '<p>Send the following people event update:</p>';
    $sql = "SELECT * FROM Event_reminders";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div id="'.$row['id'].'" class="contact_us">
                    <p> Full name: '.$row['fullname'].'</p>
                    <p> Email - id: '.$row['email_id'].'</p>
                    <p> Telephone number: '.$row['telephone_num'].'</p>
                    <p> City: '.$row['city'].'</p>
                </div>';
            }   
        }
        else {
            echo "<p> No recent contact to display! </p>";
        }
echo '</div>
</body>
</html>';
} else{
    echo "Please login!!";
    exit;
}
?>