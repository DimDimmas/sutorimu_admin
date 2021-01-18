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
        <form>
            <div class="form-group">
                <label for="">Title</label>
                <input type="text" class="form-control" id="" placeholder="New Genre">
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
          <button type="submit" class="btn btn-warning">Submit</button>
        </form>
        </div>
    </div>
