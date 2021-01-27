<?php 
    require_once('config/koneksi.php');
    require_once('config/config.php');
    require_once('models/database.php');
    $connection = new Database($host, $user, $pass, $database);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sutorimu - Anime Streaming Website</title>

        <!-- slick -->
        <link rel="stylesheet" type="text/css" href="assets/slick/slick.css"/>
        <!-- // Add the new slick-theme.css if you want the default styling -->
        <link rel="stylesheet" type="text/css" href="assets/slick/slick-theme.css"/>
        <!-- Bootstrap CSS -->
        <link href="assets/css/bs/bootstrap.css" rel="stylesheet">
        <!-- fontawesome -->
        <link rel="stylesheet" href="assets/css/fa/all.min.css">
        <!-- style -->
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- jQuery -->
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="assets/js/bs/bootstrap.min.js"></script>
        <!-- fontawesome -->
        <script src="assets/js/fa/all.min.js"></script>
        <!-- slick -->
        <script type="text/javascript" src="assets/slick/slick.min.js"></script>

    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="?page=sutorimu">Sutorimu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="nav navbar-nav ml-auto justify-content-end">
                <li class="nav-item <?php echo $link_active; ?>">
                  <a class="nav-link" href="?page=sutorimu">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item <?php echo $link_active; ?>">
                  <a class="nav-link" href="?page=list">Anime List</a>
                </li>
                <li class="nav-item <?php echo $link_active; ?>">
                    <a class="nav-link" href="?page=movie">Movie</a>
                </li>
                <li class="nav-item <?php echo $link_active; ?>">
                  <a class="nav-link" href="?page=genre">Genre</a>
                </li>
                <li class="nav-item <?php echo $link_active; ?>">
                  <a class="nav-link" href="?page=request">Request</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <form action="?page=list" method="post">
                            <input class="form-control" name="search" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </li>
              </ul>
            </div>
        </nav>

        <?php 
            if(@$_GET['page'] == '' OR @$_GET['page'] == 'sutorimu'){
                include "views/home.php";
                $link_active = ($page == 'sutorimu' OR $page=='')? 'active' : '';
            } else if(@$_GET['page'] == 'tampil'){
                include "views/tampil.php";
            } else if(@$_GET['page'] == 'list'){
                include "views/list.php";
            }else if(@$_GET['page'] == 'movie'){
                include "views/movie.php";
            }else if(@$_GET['page'] == 'genre'){
                include "views/genre.php";
            }else if(@$_GET['page'] == 'request'){
                include "views/request.php";
            }else if(@$_GET['page'] == 'anime'){
                include "views/anime.php";
            }
        ?>
        
        <footer>
            <i class="fa fa-copyright" aria-hidden="true"></i> Copyright Sutorimu - Anime Streaming Website
        </footer>

        <div class="back-top"><i class="fas fa-chevron-up"></i></div>
    </body>
    
<script type="text/javascript">
    var $backToTop = $(".back-top");
    $backToTop.hide();
    $(window).on('scroll', function() {
        if ($(this).scrollTop() > 100) {
        $backToTop.fadeIn();
        } else {
        $backToTop.fadeOut();
        }
    });

    $backToTop.on('click', function(e) {
        $("html, body").animate({scrollTop: 0}, 500);
    });
</script>
</html>
