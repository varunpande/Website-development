<?php
session_start();
require("./database_conn.php");
if(isset($_SESSION["user"])){
    $show_reg_button = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Eventos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/main.js"></script>
</head>

<body>
    <?php include('./header.php') ?>
    <div id="top-banner-container">
        <div id="overlay">
            <h1 class="title-name">EVENT</h1>
            <h5 class="title-name">INICIO &nbsp;&gt;&nbsp;Events</h5>
        </div>
    </div>
    <div id="wrapper">
        <?php
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM Events";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $event_id = $row['Event_Id'];
                echo'
                <div class="eventos-icon">
                    <img src="Images/event.jpg">
                </div>
                <div class="eventos-details">
                <div id="'.$event_id.'" class="cm1">
                    <p class="description">'.$row['Event_description'].'</p>
                    <p class="time">Time: '.$row['Event_time'].'</p>
                    <p class="date">Date: '.$row['Event_date'].'</p>
                    <p class="location">Location: '.$row['Event_location'].'</p>
                </div>';
                if($show_reg_button){
                    echo '<div id="'.$event_id.'_reg_button">';
                    $conn1 = $conn;
                $sql_query = "SELECT * FROM Event_registrations WHERE login_id LIKE '".$_SESSION["user"]."' AND event_id LIKE '".$event_id."'";
                $result1 = $conn1->query($sql_query);
                //echo '<p>'.$result1->num_rows.'</p>';
                if($result1->num_rows > 0){
                    while($row1 = $result1->fetch_assoc()) {
                        echo'<input type="button" value="De-Register" onclick="reg_button_event(\'unreg_'.$row1['event_id'].'\')"></input>';
                    }
                }
                else{
                    echo '<input type="button" value="Register" onclick="reg_button_event(\'reg_'.$row['Event_Id'].'\')"></input>';
                }
                echo '</div>';
                }
                echo '</div>';
            }   
        }
        else {
            echo "<p> no events to display! </p>";
        }
        $conn->close();
        ?>
    </div>
    <?php include('./footer.php') ?>
</body>

</html>