<?php 
define('WP_USE_THEMES', false);
require( '../wordpress/wp-blog-header.php' );
require("./database_conn.php");
?>
<html>
<head>
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/main.js"></script>
</head>

<body>
    <?php include('./header.php') ?>
    <div id="wrapper">
        <div id="inicio-background-1">
            <div id="inicio-background-2">
                <div id="inicio-overlay-1">GENTE</div>
                <div id="inicio-overlay-2"><I>Y CIUDAD</I></div>
                <div id="inicio-overlay-3">
                    Buscamos marcar un punto de partida para la transformación de nuestras dificultades y diferencias en
                    cimientos firmes que,desde las ciudades, requieren nuestros países latinoamericanos para
                    convertirse en los mejores lugares para vivir, ya no solo por las bellezas y riquezas de nuestras
                    tierras, sino por lo decisión de su gente de aportar lo mejor de si para mejorar su calidad de vida
                    y asegurar los derechos de las futuras generaciones.
                </div>
            </div>
        </div>
        <div id="inicio-objectives-container">
            <div id="inicio-objectives-container-title">
                <h1>OBJETIVOS</h1>
            </div>
            <div id="inicio-objectives-container-body">
                <p>
                    Realizar investigaciones, estudios y propuestas legislativas, relacionados con la
                    gestión de los gobierno locales para el desarrollo sostenible.
                </p>
                <p>
                    Formular proyectos para promover la participación ciudadana en iniciativas locales para
                    la sostenibilidad.
                </p>
                <p>
                    Desarrollar programas de capacitación en las áreas de participación ciudadana local y
                    gobierno abierto para la sostenibilidad.
                </p>
                <p>
                    Promover iniciativas de responsabilidad social y voluntariado, como espacios de
                    participación ciudadana
                </p>
                <p>
                    Implementar campañas de sensibilización para motivar en la audiencia el ejercicio activo
                    de la ciudadanía como eje fundamental para la transformación de las ciudades.
                </p>
            </div>
        </div>
        <div id="nuestros-valores-container">
            <div id="nuestros-valores-container-title">
                Nuestros <I>Valores</I>
            </div>
            <div id="nuestros-valores-container-body">
                <div id="nuestros-valores-container-body-col1">
                    <h1><U>CA</U>LIDAD</h1>
                    <p>Es la práctica de los integrantes de Gente & Ciudad que fomenta una mejora continua para alcanzar
                        la misión de la organización.</p>
                    <h1><U>CO</U>MPROMISO</h1>
                    <p>Los integrantes de Gente & Ciudad asumen como propio el cumplimiento de las obligaciones de la
                        institución.</p>
                </div>
                <div id="nuestros-valores-container-body-col2">
                    <h1><U>CO</U>NFIANZA</h1>
                    <p>Es la seguridad que Gente & Ciudad genera a través de sus actos.</p>
                    <h1><U>CO</U>OPERACIÓN</h1>
                    <p>En Gente & Ciudad se promueve la suma de fuerzas para lograr objetivos compartidos.</p>
                </div>
                <div id="nuestros-valores-container-body-col3">
                    <h1><U>CO</U>HERENCIA</h1>
                    <p>Todas las actuaciones de Gente & Ciudad estarán en consonancia con sus valores institucionales.
                    </p>
                    <h1><U>TR</U>ANSPARENCIA</h1>
                    <p>Es la cualidad que caracteriza y promueve Gente & Ciudad que permite conocer claramente nuestro
                        planteamientos y acciones.
                    </p>
                </div>
            </div>
        </div>
        <div id="registrate-container">
            <div id="registrate-left-side">
                <div id="registrate-left-side-box1">
                    <a href="forum.php" id="fa1" class="fa fa-microphone"></a>
                    <p>FOROS</p>
                </div>
                <div id="registrate-left-side-box2">
                    <i id="fa1" class="fa fa-users"></i>
                    <p>50 + PASTICIPANTES</p>
                </div>
                <div id="registrate-left-side-box3">
                    <a href="eventos.php" id="fa1" class="fa fa-book"></a>
                    <?php
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $sql = "SELECT * FROM Events";
                    $result = $conn->query($sql);
                    $number_of_events =$result->num_rows;
                    echo '<p>'.$number_of_events.' EVENTOS</p>';
                    ?>
                </div>
                <div id="registrate-left-side-box4">
                    <i id="fa1" class="fa fa-calendar"></i>
                    <?php
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $today = getdate();
                    $date = $today[year]."-".$today[mon]."-".$today[mday];
                    $sql = "SELECT * FROM Events WHERE Event_date = '".$date."'";
                    $result = $conn->query($sql);
                    $number_of_events =$result->num_rows;
                    echo '<p>'.$number_of_events.' EVENTOS POR DIAS</p>';
                    $conn->close();
                    ?>
                </div>
            </div>
            <div id="registrate-right-side">
                <div id="registrate-right-side-form-container">
                    <div id="registrate-right-side-form-title-1">
                        Registrate con&nbsp;
                    </div>
                    <div id="registrate-right-side-form-title-2">
                        <I>Nosotros</I>
                        <p>Para estas informado de nuestas actividades y eventos</p>
                    </div>
                    <div id="registrate-right-side-form-body">
                        <form onsubmit="event_remind()" name="eventReminder">
                            <input type="text" placeholder="Nombre Completo" name="fname">
                            <input type="email" placeholder="Correo" name="email_id"><br>
                            <input type="tel" placeholder="Telefono" name="telephone">
                            <select name="city">
                                <option value="" selected>Cuidad de Origen</option>
                                <option>ARLINTON</option>
                                <option>SUGARLAND</option>
                                <option>COOPERTOWN</option>
                                <option>DALLAS</option>
                                <option>LAKE VIEW</option>
                                <option>GRAND PRERAIE</option>
                                <option>UTAH</option>
                            </select>
                            <br>
                            <button type="submit">REGISTRAR AHORA</button>
                        </form>
                    </div>
                </div>
            </div>
            <div id="registrate-bottom">
                <div id="registrate-bottom-title">
                    Nuestros Aliados <I>Estrategicos</I>
                </div>
                <div id="registrate-bottom-body">
                    <img src="Images/image3.jpg" alt="sponsor1">
                    <img src="Images/i.jpg" alt="sponsor2">
                </div>
            </div>
        </div>
        <div id="nuestros-blog-container">
            <div id="nuestros-blog-container-title">
                Nuestros <I>Blog</I>
                <p>Esta sección esta pensada para integrar a los ciudadanos y poder tener un feedback directo con
                    nuestra comunidad.</p>
            </div>
            <div id="nuestros-valores-blog-body">
                <?php
                $i = 1;
                $number_of_posts = 3;
                $args = array( 'numberposts' => $number_of_posts );
                $recent_posts = wp_get_recent_posts( $args );
                foreach( $recent_posts as $recent_post ){
                $author = get_the_author_meta('display_name', $recent_post['post_author']);
                $date = date_create($recent_post['post_date']);
                $day = date_format($date,'d');
                $month = date_format($date,'M');
                $thumbnail_url = get_the_post_thumbnail_url($recent_post['ID']);
                $post_url = esc_url(get_permalink($recent_post['ID']));
                if(function_exists('wp_ulike_get_post_likes')){
	                $likes = wp_ulike_get_post_likes($recent_post['ID']);
	            }
	            else{
		        $likes = 0;
	            }
			    $comment_count = wp_count_comments($recent_post['ID']);
                echo '<div id="nuestros-valores-blog-body-col'.$i.'">
                    <div id="nuestros-valores-blog-img-col1">
                        <a href="'.$post_url.'"><img src="'.$thumbnail_url.'"></a>
                    </div>
                    <div class="nuestros-valores-blog-bottom-box">
                        <div id="nuestros-valores-blog-body-float">
                            <b>'.$day.'</b><br>'.$month.'
                        </div>
                        <div id="nuestros-valores-blog-body-title">
                            '.$recent_post['post_title'].'
                        </div>
                        <div id="nuestros-valores-blog-body-footer">
                            <div class="nuestros-valores-blog-body-footer-div"><i class="fa fa-user-o">&nbsp;'.$author.'</i>
                            </div>
                            <div class="nuestros-valores-blog-body-footer-div"><i class="fa fa-heart-o">&nbsp;'.$likes.'</i>
                            </div>
                            <div class="nuestros-valores-blog-body-footer-div"><i class="fa fa-comments-o">&nbsp;'.$comment_count->approved.'</i>
                            </div>
                        </div>
                    </div>
                </div>';
                $i = $i + 1;
                }
                ?>
            </div>
        </div>
    </div>
<?php include('./footer.php') ?>
</body>

</html>