<?php 
ob_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/bs/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/fa/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

</head>
<body>
    <div class="sidenav">
        <div class="title">
            <h4 style="float: left;" class="text-white"><strong>Sutorimu</strong></h4> 
            &nbsp; 
            <h6 style="float: left;" class="text-white">admin</h6>
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
        }

        else if(@$_GET['page'] == 'update'){
          include "views/update.php";
        }
        else if(@$_GET['page'] == 'add_update'){
          include "views/update/add_update.php";
        }
        else if(@$_GET['page'] == 'edit_update'){
          include "views/update/edit_update.php";
        }

        else if(@$_GET['page'] == 'list'){
          include "views/list.php";
        }
        else if(@$_GET['page'] == 'add_list'){
          include "views/list/add_list.php";
        }
        else if(@$_GET['page'] == 'edit_list'){
          include "views/list/edit_list.php";
        }

        else if(@$_GET['page'] == 'genre'){
          include "views/genre.php";
        }
        else if(@$_GET['page'] == 'add_genre'){
          include "views/genre/add_genre.php";
        }
        else if(@$_GET['page'] == 'edit_genre'){
          include "views/genre/edit_genre.php";
        }
      ?>
</body>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bs/bootstrap.min.js"></script>
    <script src="assets/js/fa/all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
</html>