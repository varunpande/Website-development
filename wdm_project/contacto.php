<!DOCTYPE html>
<html lang ="en">
<head>
    <title>Contacto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/main.js"></script>
</head>
<body>
    <?php include('./header.php') ?>
<div id="top-banner-container">
    <div id="overlay">
        <h1 class="title-name">CONTACT US</h1>
        <h5 class="title-name">HOME &nbsp;&gt;&nbsp; CONTACT US</h5>
    </div>
</div>
<div id="wrapper">
    <div id="page-divider">
        <div id="left-side-con">
            <div id="sociales-container">
                 <div id="sociales-container-title-1">
                    NUESTRAS <I>REDES</I>
                </div>
                <div id="sociales-container-title-2">
                <I><U>SO</U>CIALES</I>
                </div>
            </div>
            <div id="sociales-pics-row-1">
                <div id="sociales-pic-block-1">
                    <a href="##" id="fa-pic-1" class="fa fa-instagram"></a>
                    <p>@genteyciudadorg</p>
                </div>
                <div id="sociales-pic-block-2">
                    <a href="##" id="fa-pic-1" class="fa fa-twitter"></a>
                    <p>genteyciudadorg</p>
                </div>
            </div>
            <div id="sociales-pics-row-2">
                <div id="sociales-pic-block-3">
                    <a href="##" id="fa-pic-1" class="fa fa-phone"></a>
                    <p>001 346 714 3892</p>
                    <p>058 414 8225881</p>
                    <p>056 933948007</p>
                </div>
                <div id="sociales-pic-block-4">
                    <a href="##" id="fa-pic-1" class="fa fa-envelope"></a>
                    <p>info@genteyciudad.org</p>
                </div>
            </div>
        </div>
        <div id="right-side-con">
            <div id="contact-us-container">
                <div id="contact-us-container-title-1">
                    FORMULARIO DE&nbsp;
                </div>
                <div id="contact-us-container-title-2">
                <I><U>CO</U>NTACTO</I>
                </div>
                <div id="contact-us-container-body">
                    <form name="contacto" onsubmit="contacto_submit()">
                        <label for="Tu-Nombre">Tu Nombre</label>
                        <br>
                        <input type="text" placeholder="Tu Nombre  (requerido)" id="Tu-Nombre" name="TuNombre" required><br><br>
                        <label for="Tu Correro">Tu Correro</label><br>
                        <input type="text" placeholder="Tu Correro  (requerido)" id="Tu-Correro" name="TuCorrero"><br><br>
                        <label for="Asunto">Asunto</label>
                        <br>
                        <input type="text" placeholder="Asunto" id="Asunto" name="Asunto" required><br><br>
                        <label for="Asunto">Asunto</label>
                        <br>
                        <textarea id="Asunto-2" name="Asunto_desc" required></textarea>
                        <br>
                        <div id="contact-us-container-footer">
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