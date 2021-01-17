<?php 
  include "models/m_list.php";
  $lst = new Alist($connection);
?>
<div class="main">
        <nav class="navbar navbar-expand-lg">          
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Anime List</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <br><br>
        <center><h1><strong>Table Anime List</strong></h1></center>
        <br>
        <div class="add-new">
          <a href="#">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> New Anime
          </a>
        </div>
        <div class="table-content">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">Id List</th>
                <th scope="col">Title List</th>
                <th scope="col">Rate</th>
                <th scope="col">Status</th>
                <th scope="col">Cover Image</th>
                <th scope="col">Type</th>
                <th scope="col">Total Episode</th>
                <th scope="col">Aired</th>
                <th scope="col">Duration</th>
                <th scope="col">Synopsis</th>
                <th scope="col">genre</th>
                <th scope="col" colspan="2"><center> Action</center></th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $no = 1;
              $tampil = $lst->tampil();
              while($data = $tampil->fetch_object()){
            ?>
              <tr>
                <th scope="row"><?php echo$no++; ?></th>
                <td><?php echo $data->title_list; ?></td>
                <td><?php echo $data->rate; ?></td>
                <td><?php echo $data->statu; ?></td>
                <td><?php echo $data->cover_image; ?></td>
                <td><?php echo $data->type; ?></td>
                <td><?php echo $data->total_episode; ?></td>
                <td><?php echo $data->aired; ?></td>
                <td><?php echo $data->duration; ?></td>
                <td><?php echo $data->synopsis; ?></td>
                <td><?php echo $data->genre; ?></td>
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