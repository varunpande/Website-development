<?php
session_start();

require("./database_conn.php");

// remove all session variables
session_unset();

// destroy the session
session_destroy();

define('WP_USE_THEMES', false);
require( '../wordpress/wp-blog-header.php' );
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Adios</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/ciudad.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="./Jscript/main.js"></script>
</head>

<body>
    <?php include('./header.php') ?>
    <div id="top-banner-container">
        <div id="overlay">
            <h1 class="title-name">Thank you come again !!</h1>
            <h5 class="title-name">Checkout Blogs and Events</h5>
        </div>
    </div>
    <div id="wrapper">
        <?php
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
                    <p>'.$row['Event_description'].'.....</p>
                    <p>Time: '.$row['Event_time'].'</p>
                    <p>Date: '.$row['Event_date'].'</p>
                    <p>Location: '.$row['Event_location'].'</p>
                </div>
            </div>';
            }   
        }
        else {
            echo "no events to display!";
        }
        ?>
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
                $conn->close();
                ?>
            </div>
    </div>
    <?php include('./footer.php') ?>
</body>

</html>