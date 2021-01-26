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
                <a class="nav-link disabled" href="#">Anime List</a>
              </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="post">
              <input class="search" name="search" type="search" placeholder="Search" aria-label="Search">
            </form>
        </nav>
        <br><br>
        <center><h1><strong>Table Anime List</strong></h1></center>
        <br>
        <button class="add-new btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Anime</button>
        <div class="table-content">
          <table class="table table-striped table-dark">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Title List</th>
                <th scope="col">Rate</th>
                <th scope="col">Status</th>
                <th scope="col">Cover Image</th>
                <th scope="col">Type</th>
                <th scope="col">Total Episode</th>
                <th scope="col">Aired</th>
                <th scope="col">Duration</th>
                <th scope="col"><center>Synopsis</center></th>
                <th scope="col">Genre</th>
                <th scope="col" colspan="2"><center> Action</center></th>
              </tr>
            </thead>
            <tbody>
            <?php 
              $no = 1;
              if($_SERVER['REQUEST_METHOD'] == "POST"){
                $search = trim(mysqli_real_escape_string($con, @$_POST['search']));
                if($search != ''){
                  $tampil = $lst->search($search);                                      
                }else{
                  $tampil = $lst->tampil();
                }
            }else{
              $tampil = $lst->tampil();
            }
              while($data = $tampil->fetch_object()){
            ?>
              <tr>
                <th scope="row"><?php echo$no++; ?></th>
                <td scope="row"><?php echo $data->title_list; ?></td>
                <td scope="row"><?php echo $data->rate; ?></td>
                <td scope="row"><?php echo $data->status; ?></td>
                <td scope="row"><img src="assets/img/cover/<?php echo $data->cover_image; ?>" width="70px" alt=""></td>
                <td scope="row"><?php echo $data->type; ?></td>
                <td scope="row"><?php echo $data->total_episode; ?></td>
                <td scope="row"><?php echo $data->aired; ?></td>
                <td scope="row"><?php echo $data->duration; ?></td>
                <td scope="row">
                  <?php
                    $kalimat= $data->synopsis;
                    $huruf_maksimal=300;
                    
                    $result=substr($kalimat, 0, $huruf_maksimal);
                    if(strlen($kalimat) > $huruf_maksimal){
                      echo $result, "...";
                    } else {
                    echo $result;
                    }
                  ?>
                </td>
                <td scope="row"><?php echo $data->genre; ?></td>
                <td><center><a id="edit_lst" data-bs-toggle="modal" data-bs-target="#edit" data-id="<?php echo $data->id_list; ?>" 
                data-title="<?php echo $data->title_list; ?>" data-rate="<?php echo $data->rate; ?>" data-status="<?php echo $data->status; ?>"
                data-gbr="<?php echo $data->cover_image; ?>" data-type="<?php echo $data->type; ?>" data-total="<?php echo $data->total_episode; ?>"
                data-aired="<?php echo $data->aired; ?>" data-durasi="<?php echo $data->duration; ?>" data-sinopsis="<?php echo $data->synopsis; ?>"
                data-genre="<?php echo $data->genre; ?>">
                <button class="btn btn-dark"><i class="fas fa-pen edit"></i></button>
                </a></center></td>
                <td scope="row"><center>
                  <a href="deletel.php?id=<?php echo $data->id_list; ?>" onclick="return confirm('Delete this record?')">
                    <button type="button" class="btn btn-dark" ><i class="fa fa-trash delete" aria-hidden="true"></i></button>
                  </a>
                </center></td>
              </tr>
              <?php 
                }
              ?>
            </tbody>
          </table>
        </div>
        <!-- Modal Tambah Data -->
        <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                      <div class="form-group">
                    <label for="">Title List</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                  </div>
                  <div class="form-group">
                    <label for="">Rate</label>
                    <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate">
                  </div>
                  <div class="form-group">
                    <label for="">Status</label>
                    <select class="form-control" name="status" id="status">
                        <option readonly>-- Select --</option>
                        <option value="On-going">On-going</option>
                        <option value="Finished">Finished</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Cover Image</label>
                    <input type="file" name="gbr_cvr" class="form-control" id="">
                  </div>          
                  <div class="form-group">
                    <label for="">Type</label>
                    <select class="form-control" name="type" id="type">
                        <option readonly>-- Select --</option>
                        <option value="TV">TV</option>
                        <option value="Movie">Movie</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Total Episode</label>
                    <input type="text" class="form-control" name="total" id="toal" placeholder="Total Episode">
                  </div>
                  <div class="form-group">
                    <label for="">Aired</label>
                    <input type="text" class="form-control" name="aired" id="aired" placeholder="Aired">
                  </div>          
                  <div class="form-group">
                    <label for="">Duration</label>
                    <input type="text" class="form-control" name="durasi" id="durasi" placeholder="... min. per ep.">
                  </div>   
                  <div class="form-group">
                    <label for="">Synopsis</label>
                    <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Genre</label>
                    <div class="form-check">
                        <?php 
                            $tampil = $grn->tampil();
                            while($data = $tampil->fetch_object()){
                        ?>
                        <div style="display: inline-block; width:140px;">
                          <input type="checkbox" name="lgenre[]" id="lgenre" value="<?php echo $data->title_genre ?>">
                            <label class="form-check-label" for=""><?php echo $data->title_genre ?></label>
                        </div>
                        <?php } ?>
                    </div>
                  </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <input type="submit" value="Submit" name="tambah" class="btn btn-warning">
                    </div>
                  </form>
                  <?php 
                    if(@$_POST['tambah']){
                      $title = $connection->conn->real_escape_string($_POST['title']);
                      $rate = $connection->conn->real_escape_string($_POST['rate']);
                      $status = $connection->conn->real_escape_string($_POST['status']);

                      $type = $connection->conn->real_escape_string($_POST['type']);
                      $total = $connection->conn->real_escape_string($_POST['total']);
                      $aired = $connection->conn->real_escape_string($_POST['aired']);
                      $durasi = $connection->conn->real_escape_string($_POST['durasi']);
                      $sinopsis = $connection->conn->real_escape_string($_POST['sinopsis']);
                      $lgenre = $connection->conn->real_escape_string($_POST['lgenre']);

                      $chkgenre = implode(", ", $_POST['lgenre']);

                      $extensi = explode(".", $_FILES['gbr_cvr']['name']);
                      $gbr_cvr = "cvr-".round(microtime(true)).".".end($extensi);
                      $sumber = $_FILES['gbr_cvr']['tmp_name'];
                      $upload = move_uploaded_file($sumber, "assets/img/cover/".$gbr_cvr);

                      if($upload){
                        $lst->tambah($title, $rate, $status, $gbr_cvr, $type, $total, $aired, $durasi, $sinopsis, $chkgenre);
                        echo "<script>alert('Data Berhasil Di tambahkan')</script>
                        <script>window.location='?page=list';</script>";
                      }else{
                        echo "<script>alert('Upload Gambar Gagal')</script>
                        <script>window.location='?page=list';</script>";
                      }
                    }
                  ?>
                </div>
            </div>
        </div>
        
        <!-- Modal Edit Data -->
        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Edit List</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="form" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edit">
                      <div class="form-group">
                  <label for="">Title List</label>
                  <input type="hidden" class="form-control" id="id_list" name="id_list">
                  <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                </div>
                <div class="form-group">
                  <label for="">Rate</label>
                  <input type="text" class="form-control" id="rate" name="rate" placeholder="Rate">
                </div>
                <div class="form-group">
                  <label for="">Status</label>
                  <select class="form-control" name="status" id="status">
                      <option disabled>-- Select --</option>
                      <option value="On-going">On-going</option>
                      <option value="Finished">Finished</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Cover Image</label>
                  <div style="padding-bottom: 5px;">
                      <img src="" width="80px" id="pict" alt="Previous Image">
                  </div>
                  <input type="file" name="gbr_cvr" class="form-control" id="gbr_cvr">
                </div>          
                <div class="form-group">
                  <label for="">Type</label>
                  <select class="form-control" name="type" id="type">
                      <option disabled>-- Select --</option>
                      <option value="TV">TV</option>
                      <option value="Movie">Movie</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">Total Episode</label>
                  <input type="text" class="form-control" name="total" id="total" placeholder="Total Episode">
                </div>
                <div class="form-group">
                  <label for="">Aired</label>
                  <input type="text" class="form-control" name="aired" id="aired" placeholder="Aired">
                </div>          
                <div class="form-group">
                  <label for="">Duration</label>
                  <input type="text" class="form-control" name="durasi" id="durasi" placeholder="... min. per ep.">
                </div>   
                <div class="form-group">
                  <label for="">Synopsis</label>
                  <textarea class="form-control" id="sinopsis" name="sinopsis" rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="">Genre</label>
                  <div class="form-check">
                  <?php 
                      $tampil = $grn->tampil();
                      while($data = $tampil->fetch_object()){
                  ?>
                  <div style="display: inline-block; width:140px;">
                    <input type="checkbox" name="lgenre[]" id="lgenre" value="<?php echo $data->title_genre ?>">
                      <label class="form-check-label" for=""><?php echo $data->title_genre ?></label>
                  </div>
                  <?php } ?>
                  </div>
                </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <input type="submit" value="Submit" name="edit" class="btn btn-warning">
                    </div>
                  </form>
                </div>
            </div>
        </div>
        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
          $(document).on("click", "#edit_lst", function(){
            var idlist = $(this).data('id');
            var title = $(this).data('title');
            var rate = $(this).data('rate');
            var status = $(this).data('status');
            var gbrcvr = $(this).data('gbr');
            var type = $(this).data('type');
            var total = $(this).data('total');
            var aired = $(this).data('aired');
            var durasi = $(this).data('durasi');
            var sinopsis = $(this).data('sinopsis');
            $("#modal-edit #id_list").val(idlist);
            $("#modal-edit #title").val(title);
            $("#modal-edit #rate").val(rate);
            $("#modal-edit #status").val(status);
            $("#modal-edit #pict").attr("src", "assets/img/"+gbrcvr);
            $("#modal-edit #type").val(type);
            $("#modal-edit #total").val(total);
            $("#modal-edit #aired").val(aired);
            $("#modal-edit #durasi").val(durasi);
            $("#modal-edit #sinopsis").val(sinopsis);
          })

          $(document).ready(function(e){
                    $("#form").on("submit", (function(e) {
                      e.preventDefault();
                      $.ajax({
                        url : 'models/proses_edit_list.php',
                        type : 'POST',
                        data : new FormData(this),
                        contentType : false,
                        cache : false,
                        processData : false,
                        success : function(msg) {
                          $('.table').html(msg);
                        }
                      });
                    }));
                  })
        </script>


      </div>
