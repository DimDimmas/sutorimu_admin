<?php 
require_once('config/koneksi.php');
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
            <a class="navbar-brand" href="./">Sutorimu</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
              <ul class="nav navbar-nav ml-auto justify-content-end">
                <li class="nav-item active">
                  <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="?page=anime_list">Anime List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="?page=movie">Movie</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="genre.html">Genre</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="request.html">Request</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <form>
                            <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </li>
              </ul>
            </div>
        </nav>

        <div class="container-fluid" style="margin-top: 2%;">
            <div class="row">
                
                <?php 
                    if(@$_GET['page'] == ''){
                        include "views/home.php";
                    } else if(@$_GET['page'] == 'tampil'){
                        include "views/tampil.php";
                    } else if(@$_GET['page'] == 'anime_list'){
                        include "views/anime_list.php";
                    }else if(@$_GET['page'] == 'movie'){
                        include "views/movie.php";
                    }
                ?>
                

                <div class="space">
                    <!-- genre -->
                    <div class="ongoing">
                        <div class="title-ongoing">
                            <strong><h6>Genre</h6></strong>
                        </div>
                        <ul class="ul-genre">
                            <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; Action <span class="right count">(15)</span></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; Comedy <span class="right count">(15)</span></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; Fantasy <span class="right count">(15)</span></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; Magic <span class="right count">(15)</span></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; Romance <span class="right count">(15)</span></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; School <span class="right count">(15)</span></a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; Drama <span class="right count">(15)</span></a></li>
                        </ul>
                    </div>
                <!-- end genre -->
                </div>
            </div>
        </div>
        
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
