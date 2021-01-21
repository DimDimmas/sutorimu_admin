<?php 
  include "models/m_list.php";
  include "models/m_update.php";

  $tmb = new Update($connection);
  $upd = new Alist($connection);
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
        <center><h1><strong>Add New Update</strong></h1></center>
        <br>
        <div class="table-content bg-content">
        <form method="post" action="">
          <div class="form-group">
            <label for="">Title</label>
            <select class="form-control" name="title" id="">
            <option>-- Select --</option>
            <?php 
             $no = 1;
             $tampil = $upd->tampil();
             while($data = $tampil->fetch_object()){
            ?>
              <option value="<?php echo $data->title_list; ?>"><?php echo $data->title_list; ?></option>
            <?php } ?>
            </select>
          </div>            
          <div class="form-group">
            <label for="">Episode</label>
            <input type="text" class="form-control" name="episode" id="" placeholder="New Episode">
          </div>
          <input type="submit" value="Tambah" name="tambah" class="btn btn-warning">
          <button type="reset" class="btn btn-danger">Reset</button>
        </form>
        <?php 
          if(@$_POST['tambah']){
            $title = $connection->conn->real_escape_string($_POST['title']);
            $episode = $connection->conn->real_escape_string($_POST['episode']);
            $tmb->tambah($title, $episode);
            echo "<Script>alert('Data Berhasil Di tambahkan')</script>";

          }
        ?>
        </div>
    </div>
