<?php 
  include "models/m_genre.php";
  include "models/m_list.php";
  $grn = new Genre($connection);
  $lst = new Alist($connection);
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
        <form action="" method="post" enctype="multipart/form-data">        
          <div class="form-group">
            <label for="">Title List</label>
            <input type="text" class="form-control" id="" name="title" placeholder="Title">
          </div>
          <div class="form-group">
            <label for="">Rate</label>
            <input type="text" class="form-control" id="" name="rate" placeholder="Rate">
          </div>
          <div class="form-group">
            <label for="">Status</label>
            <select class="form-control" name="status" id="">
                <option>-- Select --</option>
                <option value="On-going">On-going</option>
                <option value="Finished">Finished</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Cover Image</label>
            <input type="file" name="gambar" class="form-control" id="">
          </div>          
          <div class="form-group">
            <label for="">Type</label>
            <select class="form-control" name="type" id="">
                <option>-- Select --</option>
                <option value="TV">TV</option>
                <option value="Movie">Movie</option>
            </select>
          </div>
          <div class="form-group">
            <label for="">Total Episode</label>
            <input type="text" class="form-control" name="total" id="" placeholder="Total Episode">
          </div>
          <div class="form-group">
            <label for="">Aired</label>
            <input type="text" class="form-control" name="aired" id="" placeholder="Aired">
          </div>          
          <div class="form-group">
            <label for="">Duration</label>
            <input type="text" class="form-control" name="durasi" id="" placeholder="... min. per ep.">
          </div>   
          <div class="form-group">
            <label for="">Synopsis</label>
            <textarea class="form-control" id="" name="sinopsis" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="">Genre</label>
            <div class="form-check">
                <?php 
                    $tampil = $grn->tampil();
                    while($data = $tampil->fetch_object()){
                ?>
                <div style="display: inline-block; width:120px;">
                   <input type="checkbox" name="lgenre" value="<?php echo $data->title_genre ?>" id="">
                    <label class="form-check-label" for=""><?php echo $data->title_genre ?></label>
                </div>
                <?php } ?>
            </div>
          </div>
          
          <input type="submit" value="Submit" class="btn btn-warning" name="tambah">
        </form>
        <?php 
          // if(@$_POST['tambah']){
          //   $title = $connection->conn->real_escape_string($_POST['title']);
          //   $rate = $connection->conn->real_escape_string($_POST['rate']);
          //   $status = $connection->conn->real_escape_string($_POST['status']);

          //   $extensi = explode(".", $_FILES['gambar']['name']);
          //   $gambar = "cvr-".round(microtime(true)).".".end($extensi);
          //   $sumber = $_FILES['gambar']['tmp_name'];
          //   $upload = move_uploaded_file($sumber, "assets/img/".$gambar);

          //   $type = $connection->conn->real_escape_string($_POST['type']);
          //   $total = $connection->conn->real_escape_string($_POST['total']);
          //   $aired = $connection->conn->real_escape_string($_POST['aired']);
          //   $durasi = $connection->conn->real_escape_string($_POST['durasi']);
          //   $sinopsis = $connection->conn->real_escape_string($_POST['sinopsis']);
          //   $lgenre = $connection->conn->real_escape_string($_POST['lgenre']);

            

          //   if($upload){
          //     $lst->tambah($title, $rate, $status, $gambar, $type, $total, $aired, $durasi, $sinopsis, $lgenre);
          //     echo "<script>alert('Data Berhasil Di tambahkan')</script>";
          //   }else{
          //     echo "<script>alert('Upload Gambar Gagal')</script>";
          //   }
          // }
        ?>
        </div>
    </div>
