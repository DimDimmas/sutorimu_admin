`<?php 
  include "models/m_update.php";
  $upd = new Update($connection);
?>
<!-- Page content -->
<div class="main">
        <nav class="navbar navbar-expand-lg">          
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Update List</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <br><br>
        <center><h1><strong>Table Update</strong></h1></center>
        <br>
        <div class="add-new">
          <a href="#">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Update New Episode
          </a>
        </div>
        <div class="table-content">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title</th>
                <th scope="col">Episode</th>
                <th scope="col" colspan="2"><center> Action</center></th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $no = 1;
              $tampil = $upd->tampil();
              while($data = $tampil->fetch_object()){
            ?>
              <tr>
                <th scope="row"><?php echo $no++ ?></th>
                <td><?php echo $data->episode; ?></td>
                <td><?php echo $data->title_list; ?></td>
                <td><center><a href="#"><i class="fas fa-pen edit"></i></a></center></td>
                <td><center><a href="#"><i class="fa fa-trash delete" aria-hidden="true"></i></a></center></td>
              </tr>
              <?php 
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>