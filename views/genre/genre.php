 <?php 
  include "models/m_genre.php";
  $grn = new Genre($connection);
 ?>
 <!-- Page content -->
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
        <center><h1><strong>Genre List</strong></h1></center>
        <br>
        <a class="add-new" data-toggle="modal" href="?page=add_genre">
          <i class="fa fa-plus-circle" aria-hidden="true"></i> New Genre
        </a>
        <div class="table-content">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title Genre</th>
                <th scope="col" colspan="2"><center> Action</center></th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $no = 1;
              $tampil = $grn->tampil();
              while($data = $tampil->fetch_object()){
            ?>
              <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo $data->title_genre ?></td>
                <td><center><a href="?page=edit_genre" data-id="<?php echo $data->id_genre; ?>"><i class="fas fa-pen edit"></i></a></center></td>
                <td><center><a href="#"><i class="fa fa-trash delete" aria-hidden="true"></i></a></center></td>
              </tr>
              <?php 
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>