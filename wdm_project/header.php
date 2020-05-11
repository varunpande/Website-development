<?php
// ---- This part is just to handle the current page -----//
$hashtag = basename($_SERVER['SCRIPT_FILENAME']);
$array_of_links = array('inicio.php','nosotros.php','equipos.php','http://vbp2538.uta.cloud/wordpress/','contacto.php','javascript:login_toggle()');
for($i = 0; $i < count($array_of_links); $i++){
    if($hashtag == $array_of_links[$i]){
        $array_of_links[$i] = '#';
    }
}
if(isset($_SESSION["user"])){
    $session_text = "cerrar sesion";
    $array_of_links[5] = "logout.php";
}else{
    $session_text = "Inicio de Sesion";
}
// ---- This part is just to handle the current page -----//
echo '
<div id = "login_window" class="hide_login">
        <div id="login-container">
            <div id="login-container-title-1">
                Inicio de&nbsp;
            </div>
            <div id="login-container-title-2">
            <I>Sesion</I><a href="javascript:login_toggle()">X</a>
            </div>
            <div id="login-container-body">
                <form action="login.php" method="post">
                    <label for="correo">Correo</label><br>
                    <input type="text" placeholder="Tu Correo" id="correo" name="username" required><br>
                    <label for="contrasena">Contrasena</label><br>
                    <input type="password" placeholder="Tu Contrasena" id="contrasena" name="password" required>
                    <div id="login-container-footer">
                        <button type="submit">ENVIAR</button>
                        <a href="http://vbp2538.uta.cloud/assignment4/registration_page.php">Registrarse</a>
                    </div>
                </form>
            </div>
        </div>
</div>
<header><meta charset="gb18030">
    <div id="head">
        <img id="icon" src="Images/i.jpg">
        <nav>
            <a class="nav_content" href="'.$array_of_links[0].'">Inicio</a>/
            <a class="nav_content" href="'.$array_of_links[1].'">Nosotros</a>/
            <a class="nav_content" href="'.$array_of_links[2].'">Equipos</a>/
            <a class="nav_content" href="'.$array_of_links[3].'">Blog</a>/
            <a class="nav_content" href="'.$array_of_links[4].'">Contacto</a>/
            <a class="nav_content" href="'.$array_of_links[5].'">'.$session_text.'</a>
        </nav>
        <div id="mobile-menu">
        <select onchange="javascript:mobile_menu(this.options[this.selectedIndex].value)">
        <option value="#">Navigation</option>
        <option value = "'.$array_of_links[0].'">Inicio</option>
        <option value="'.$array_of_links[1].'">Nosotros</option>
        <option value="'.$array_of_links[2].'">Equipos</option>
        <option value="'.$array_of_links[3].'">Blog</option>
        <option value="'.$array_of_links[4].'">Contacto</option>
        <option value="'.$array_of_links[5].'">'.$session_text.'</option></select>
        </div>
    </div>
</header>
';
?>