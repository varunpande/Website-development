<?php
require("./database_conn.php");
?>
<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Equipos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/main.js"></script>
</head>
<body>
    <?php include('./header.php') ?>
<div id="top-banner-container">
    <div id="overlay">
        <h1 class="title-name">NUESTROS EQUIPOS</h1>
        <h5 class="title-name">INICIO &nbsp;&gt;&nbsp; NUESTROS EQUIPOS</h5>
    </div>
</div>
<div id="wrapper">
    <div id="equipos-de-nosotros-div">
        <div id="equipos-overlay-1">Equipo de <I>Direccion</I></div>
    </div>
    <?php
        echo '<div id="direccion-parent-row-1">';
        $sql = "SELECT * FROM Employees WHERE team = 'direction'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo'<div class="direccion-row-1-block">
                        <img class="image-row-1" src="'.$row['img_path'].'">
                        <h2>'.$row['name'].'</h2>
                        <h3>'.$row['location'].'</h3>
                    </div>';
            }   
        }
        else {
            echo "no employees to display!";
        }
        echo '</div>';
        echo '<div id="equipos-de-nosotros-div2">
              <div id="equipos-overlay-2">Equipo de <I>Trabajo Multidisciplina</I></div>
            </div>';
        $sql = "SELECT * FROM Employees WHERE team = 'work'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $i = 0;
            while($row = $result->fetch_assoc()) {
                if($i%4 == 0){
                    echo'<div id="direccion-parent-row-n">';
                }
                echo'<div class="direccion-row-n-block">
                        <img class="image-row-1" src="'.$row['img_path'].'">
                        <h2>'.$row['name'].'</h2>
                        <h3>'.$row['location'].'</h3>
                    </div>';
                if($i%4 == 3){
                    echo'</div>';
                    $i = 0;
                }
                else{
                 $i++;   
                }
            }   
        }
        else {
            echo "no employees to display!";
        }
    ?>
    </div>
</div>
<?php include('./footer.php') ?>
    
</body>
</html>