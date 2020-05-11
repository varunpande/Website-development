<?php
session_start();
require("./database_conn.php");
if(isset($_SESSION["user"]) and $_SESSION["role"] == "admin"){
    echo '<html lang="en">

<head>
    <title>Event Mgmt</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/event_mgmt.js"></script>
    <script src="./Jscript/main.js"></script>
</head>

<body>
<header>
    <div id="head">
        <img id="icon" src="Images/i.jpg">
        <nav>
            <a class="nav_content" href="admin_ui.php">Home</a>/
            <a class="nav_content" href="admin_contact_list.php">To be contacted</a>/
            <a class="nav_content" href="#">Event Management</a>/
            <a class="nav_content" href="logout.php">Logout</a>
        </nav>
        <div id="mobile-menu">
        <select onchange="javascript:mobile_menu(this.options[this.selectedIndex].value)">
        <option value="#">Navigation</option>
        <option value="admin_ui.php">Home</option>
        <option value ="admin_contact_list.php">To be contacted</option>
        <option value="#">Event Management</option>
        <option value="logout.php">Logout</option></select>
        </div>
    </div>
</header>
<div id = "login_window" class="hide_login">
        <div id="login-container">
            <div id="login-container-title-1">
                Crea un nuevo&nbsp;
            </div>
            <div id="login-container-title-2">
            <I>evento</I><a href="javascript:login_toggle()">X</a>
            </div>
            <div id="login-container-body">
                <form action="new_event.php" method="post">
                    <label for="desc">Descripcion</label><br>
                    <input type="text" placeholder="Descripcion" id="desc" name="description" required><br>
                    <label for="time">Hora</label><br>
                    <input type="text" placeholder="hora HH:MM:SS" id="time" name="time" required><br>
                    <label for="date">Fecha</label><br>
                    <input type="text" placeholder="fecha YYYY-MM-DD" id="date" name="date" required><br>
                    <label for="location">Ubicacion</label><br>
                    <input type="text" placeholder="Ubicacion" id="correo" name="location" required><br>
                    <div id="login-container-footer">
                        <div>
                            <button type="submit">ENVIAR</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
</div>
    <div id="top-banner-container">
        <div id="overlay">
            <h1 class="title-name">Hi '. $_SESSION["user"].'</h1>
            <h5 class="title-name">INICIO &nbsp;&gt;&nbsp;Events</h5>
        </div>
    </div>
    <div class="fab" onclick="login_toggle()"> + </div>
    <div id="wrapper">';
    $sql = "SELECT * FROM Events";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo'
                <div class="eventos-icon">
                    <img src="Images/event.jpg">
                </div>
                <div class="eventos-details">
                <div id="'.$row['Event_Id'].'" class="cm1">
                    <p class="description">'.$row['Event_description'].'</p>
                    <p class="time">Time: '.$row['Event_time'].'</p>
                    <p class="date">Date: '.$row['Event_date'].'</p>
                    <p class="location">Location: '.$row['Event_location'].'</p>
                </div>
                <div id="'.$row['Event_Id'].'_control_div">
                    <input type="button" value="Edit" onclick="edit_event(\''.$row['Event_Id'].'\')"></input>
                    </br>
                    <input type="button" value="Delete" onclick="del_event(\''.$row['Event_Id'].'\')"></input>
                </div>
            </div>';
            }   
        }
        else {
            echo "<p> no events to display! </p>";
        }
 echo '</div>';
echo '</body>
</html>';
} else{
    echo "Please login!!";
    exit;
}
?>