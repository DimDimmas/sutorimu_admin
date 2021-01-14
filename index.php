<?php 

  require_once('config/koneksi.php');
  require_once('models/database.php');

  $connection = new Database($host, $user, $pass, $database);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sutorimu</title>
    <link rel="stylesheet" href="assets/css/bs/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fa/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="sidenav">
        <div class="title">
            <h4 style="float: left;"><strong>Sutorimu</strong></h4> 
            &nbsp; 
            <h6 style="float: left;">admin</h6>
        </div>
        <ul class="nav flex-column">
        <li class="nav-item">
              <a class="nav-link hover" href="?page=dashboard"> <i class="fas fa-tachometer-alt" aria-hidden="true"></i> &nbsp; Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hover" href="?page=update"> <i class="fa fa-angle-double-up" aria-hidden="true"></i> &nbsp; Update</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hover" href="?page=list"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp; List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hover" href="?page=genre"><i class="fas fa-tv"></i> &nbsp; Genre</a>
            </li>
        </ul>
      </div>
      
      <!-- Page content -->
      <?php 

        if(@$_GET['page'] == 'dashboard' || @$_GET['page'] == ''){
          include "views/dashboard.php";
        }else if(@$_GET['page'] == 'update'){
          include "views/update.php";
        }else if(@$_GET['page'] == 'list'){
          include "views/list.php";
        }else if(@$_GET['page'] == 'genre'){
          include "views/genre.php";
        }
      
      ?>
</body>
    <script src="assets/js/bs/bootstrap.min.js"></script>
    <script src="assets/js/fa/all.js"></script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
</html>