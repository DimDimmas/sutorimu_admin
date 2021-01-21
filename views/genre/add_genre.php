<?php 
  include "models/m_genre.php";
  $grn = new Genre($connection);
 ?>
<div class="main">
        <nav class="navbar navbar-expand-lg">          
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Genre Table</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <br><br>
        <center><h1><strong>Add New Genre</strong></h1></center>
        <br>
        <div class="table-content bg-content">
        <form action="" method="POST">
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" name="genre" placeholder="New Genre">
            </div>
            <div class="form-group">
                <label for="">All Genre</label>
                <select class="form-control" readonly="readonly">
                <?php 
                $no = 1;
                $tampil = $grn->tampil();
                while($data = $tampil->fetch_object()){
                ?>
                <option><?php echo $data->title_genre; ?></option>
                <?php } ?>
                </select>
            </div>
          <input type="submit" value="Submit" class="btn btn-warning" name="tambah">
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
        <?php 
          if(@$_POST['tambah']){
            $genre = $connection->conn->real_escape_string($_POST['genre']);
            $grn->tambah($genre);
            echo "<script>alert('Data Berhasil Di tambahkan')</script>";
            
          }
        ?>
        </div>
    </div>
