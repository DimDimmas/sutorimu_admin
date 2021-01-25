<?php 
  include "models/m_update.php";
  $upd = new Update($connection);
?>
<div class="main">
        <nav class="navbar navbar-expand-lg">          
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Update Table</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <br><br>
        <center><h1><strong>Edit New Update</strong></h1></center>
        <br>
        <div class="table-content bg-content">
        <form>
          <div class="form-group">
            <label for="">Title</label>
            <select class="form-control" id="" disabled>
            <?php 
              $no = 1;
              $tampil = $upd->tampil();
              $data = $tampil->fetch_object()
            ?>
              <option><?php echo $data->title_list; ?></option>
            </select>
          </div>            
          <div class="form-group">
            <label for="">Episode</label>
            <input type="text" class="form-control" id="" placeholder="New Episode" value="<?php echo $data->episode; ?>">
          </div>
          <button type="submit" class="btn btn-warning">Submit</button>
        </form>
        </div>
    </div>
