<?php 
  include "models/m_genre.php";
  $grn = new Genre($connection);
 ?>
<div class="main">
        <nav class="navbar navbar-expand-lg">          
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link disabled" href="#">List Table</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <br><br>
        <center><h1><strong>Add New Anime</strong></h1></center>
        <br>
        <div class="table-content bg-content">
        <form>        
          <div class="form-group">
            <label for="">Title List</label>
            <input type="text" class="form-control" id="" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="">Rate</label>
            <input type="text" class="form-control" id="" placeholder="Rate">
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" id="">
                <option>-- Select --</option>
                <option>On-going</option>
                <option>Finished</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Cover Image</label>
            <input type="file" class="form-control" id="">
          </div>          
          <div class="form-group">
            <label for="">Type</label>
            <select class="form-control" id="">
                <option>-- Select --</option>
                <option>TV</option>
                <option>Movie</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Total Episode</label>
            <input type="text" class="form-control" id="" placeholder="Total Episode">
          </div>
          <div class="form-group">
            <label for="">Aired</label>
            <input type="text" class="form-control" id="" placeholder="Aired">
          </div>          
          <div class="form-group">
            <label for="">Duration</label>
            <input type="text" class="form-control" id="" value="... min. per ep.">
          </div>   
          <div class="form-group">
            <label for="">Synopsis</label>
            <textarea class="form-control" id="" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="">Genre</label>
            <div class="form-check">
                <?php 
                    $tampil = $grn->tampil();
                    while($data = $tampil->fetch_object()){
                ?>
                <div style="display: inline-block; width:120px;">
                    <input type="checkbox" class="form-check-input" id="">
                    <label class="form-check-label" for=""><?php echo $data->title_genre ?></label>
                </div>
                <?php } ?>
            </div>
          </div>
          
          <button type="submit" class="btn btn-warning">Submit</button>
        </form>
        </div>
    </div>
