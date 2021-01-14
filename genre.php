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
              <a class="nav-link hover" href="update.php"> <i class="fa fa-angle-double-up" aria-hidden="true"></i> &nbsp; Update</a>
            </li>
            <li class="nav-item">
              <a class="nav-link hover" href="list.php"><i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp; List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active"><i class="fas fa-tv"></i> &nbsp; Genre</a>
            </li>
        </ul>
      </div>
      
      <!-- Page content -->
      <div class="main">
        <nav class="navbar navbar-expand-lg">          
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Genre List</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <br><br>
        <center><h1><strong>Table Genre</strong></h1></center>
        <br>
        <div class="add-new">
          <a href="#">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> New Genre
          </a>
        </div>
        <div class="table-content">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Id Genre</th>
                <th scope="col">Title Genre</th>
                <th scope="col" colspan="2"><center> Action</center></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Otto</td>
                <td><center><a href="#"><i class="fas fa-pen edit"></i></a></center></td>
                <td><center><a href="#"><i class="fa fa-trash delete" aria-hidden="true"></i></a></center></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
</body>
    <script src="assets/js/bs/bootstrap.min.js"></script>
    <script src="assets/js/fa/all.js"></script>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
</html>