<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Registro</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/member_reg.js"></script>
    <script src="./Jscript/main.js"></script>
</head>
<body>
    <?php include('./header.php') ?>
<div id="top-banner-container">
    <div id="overlay">
        <h1 class="title-name">REGISTRO</h1>
        <h5 class="title-name">INICIO &nbsp;&gt;&nbsp; REGISTRO</h5>
    </div>
</div>
<div id="wrapper">
    <div id="page-divider">
        <div id="left-side">
           <div id="register-with-us-container">
                <div id="register-with-us-container-title-1">
                    REGISTREATE CON &nbsp;
                </div>
                <div id="register-with-us-container-title-2">
                <I><U>NO</U>SOTROS</I>
                </div>
                <div id="register-with-us-container-body">
                    <form onsubmit="submitReg()" name="reg">
                        <label for="primer nombre">primer nombre</label>
                        <br>
                        <input type="text" placeholder="primer nombre" id="primer nombre" name="firstname" required>
                        <br>
                        <br>
                        <label for="segundo nombre">segundo nombre</label>
                        <br>
                        <input type="text" placeholder="segundo nombre" id="segundo nombre" name="middlename" required>
                        <br>
                        <br>
                        <label for="apellido">apellido</label>
                        <br>
                        <input type="text" placeholder="apellido" id="apellido" name="lastname" required>
                        <br>
                        <br>
                        <label for="location">location</label>
                        <br>
                        <input type="text" placeholder="location" id="location" name="location" required>
                        <br>
                        <br>
                        <label for="nombre de usuario">nombre de usuario</label>
                        <br>
                        <input type="text" placeholder="nombre de usuario" id="nombre de usuario" name="username" required>
                        <br>
                        <br>
                        <label for="identificación de correo">identificación de correo</label>
                        <br>
                        <input type="email" placeholder="identificación de correo" id="identificación de correo" name="mailId" required>
                        <br>
                        <br>
                        <label for="contraseña">contraseña</label>
                        <br>
                        <input type="password"  id="contraseña" name="password" placeholder="contraseña" required>
                        <br>
                        <br>
                        <label for="Vuelva a escribir la contraseña">Vuelva a escribir la contraseña</label>
                        <br>
                        <input type="password" id="Vuelva a escribir la contraseña" name="password_again" placeholder="Vuelva a escribir la contraseña" required>
                        <br>
                        <br>
                        <label for="dirección de correo electrónico de recuperación">dirección de correo electrónico de recuperación</label>
                        <br>
                        <input type="email" id="dirección de correo electrónico de recuperación" name="recoveryEmail" placeholder="dirección de correo electrónico de recuperación" required><br><br>
                        <br>
                        <br>
                        <div id="register-with-us-container-footer">
                                <button  type="submit">ENVIAR</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
        
<?php include('./footer.php') ?>
    
</body>
</html>