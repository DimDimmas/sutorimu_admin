<?php 
  include "models/m_update.php";
  include "models/m_list.php";
  $upd = new Update($connection);
  $lst = new Alist($connection);

?>
<!-- Page content -->
<div class="main">
    <nav class="navbar navbar-expand-lg">          
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Update Table</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="" method="post">
          <input class="search" name="search" type="search" placeholder="Search" aria-label="Search">
        </form>
    </nav>
    <br><br>
    <center><h1><strong>Update List</strong></h1></center>
    <br>
    <button class="btn btn-success add-new" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fa fa-plus-circle" aria-hidden="true"></i> Update New Episode</button>
    <div class="table-content">
      <table class="table table-striped table-dark">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Title</th>
            <th scope="col">Episode</th>
            <th scope="col">Preview</th>
            <th scope="col">Link Video</th>
            <th scope="col" colspan="2"><center> Action</center></th>
          </tr>
        </thead>
        <tbody>
        <?php 
          $no = 1;
            $search = @$_POST['search'];
            if($search != ''){
              $tampil = $upd->search($search);                                      
            }else{
              $tampil = $upd->tampil();
            }
          
            while($data = $tampil->fetch_object()){
        ?>
          <tr>
            <th scope="row"><?php echo $no++ ?></th>
            <td><?php echo $data->title_list; ?></td>
            <td><?php echo $data->episode; ?></td>
            <td><?php echo $data->preview; ?></td>
            <td><?php echo $data->embed_link; ?></td>
            <td><center><a id="edit_upd" data-id="<?php echo $data->no; ?>" data-title="<?php echo $data->title_list; ?>"
            data-episode="<?php echo $data->episode; ?>" data-prv="<?php echo $data->preview; ?>" data-embed="<?php echo $data->embed_link; ?>" data-bs-toggle="modal" data-bs-target="#edit">
              <button class="btn btn-dark"><i class="fas fa-pen edit"></i></button></a></center></td>
            <td>
              <center>
                <a href="deleteu.php?id=<?php echo $data->no; ?>" data-id="<?php echo $data->no ?>" onclick="return confirm('Delete this record?')">
                <button type="button" class="btn btn-dark" ><i class="fa fa-trash delete" aria-hidden="true"></i></button>
                </a>
              </center>
            </td>
          </tr>
          <?php 
            }
          ?>
        </tbody>
      </table>
    </div>
    <!-- Modal Tambah Genre -->
    <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Genre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form action="" method="post">
                    <div class="modal-body" >
                      <div class="form-group">
                        <label for="title_list" class="control-label">Title</label>
                        <select name="title_list" id="title_list" class="form-control">
                        <option>-- SELECT --</option>
                        <?php 
                          $tampil = $lst->tampil();
                          while($data = $tampil->fetch_object()){
                        ?>
                          <option value="<?php echo $data->title_list ?>"><?php echo $data->title_list ?></option>
                          <?php 
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="eps" class="control-label">Episode</label>
                        <input type="text" name="eps" id="eps" class="form-control" required>
                      </div>
                      <div class="form-group">
                        <label for="">Preview Image</label>
                        <input type="file" name="gbr_prv" class="form-control" id="" required>
                      </div>
                      <div class="form-group">
                        <label for="eps" class="control-label">Link Video</label>
                        <input type="text" name="emb" id="emb" class="form-control" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <input type="submit" value="Submit" name="tambah" class="btn btn-warning">
                    </div>
                  </form>
                  <?php 
                    if(@$_POST['tambah']){
                      $title = $connection->conn->real_escape_string($_POST['title_list']);
                      $episode = $connection->conn->real_escape_string($_POST['eps']);
                      $embed = $connection->conn->real_escape_string($_POST['emb']);

                      $extensi = explode(".", $_FILES['gbr_prv']['name']);
                      $gbr_prv = "prv-".round(microtime(true)).".".end($extensi);
                      $sumber = $_FILES['gbr_prv']['tmp_name'];
                      $upload = move_uploaded_file($sumber, "assets/img/preview/".$gbr_prv);
                      if($upload){
                        $upd->tambah($title, $episode, $gbr_prv, $embed);
                        echo "<script>alert('Data Berhasil Ditambahkan');</script>
                        <script>window.location='?page=update';</script>";
                      }else{
                        echo "<script>alert('Upload Gambar Gagal')</script>
                        <script>window.location='?page=update';</script>";
                      }
                  }
                  ?>
                </div>
            </div>
        </div>

        <!-- Modal Edit Genre -->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Edit Data Genre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="form" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edit">
                      <div class="form-group">
                        <label for="title_list" class="control-label">Title</label>
                        <input type="hidden" name="id_upd" id="id_upd">
                        <select name="title_list" id="title_list" class="form-control" readonly>
                        <?php 
                          $tampil = $lst->tampil();
                          while($data = $tampil->fetch_object()){
                        ?>
                          <option value="<?php echo $data->title_list ?>"><?php echo $data->title_list ?></option>
                          <?php 
                            }
                          ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="eps" class="control-label">Episode</label>
                        <input type="text" name="eps" id="eps" class="form-control">
                      </div>
                      <div class="form-group">
                        <label for="">Preview Image</label>
                        <div style="padding-bottom: 5px;">
                            <img src="" width="80px" id="pict" alt="Previous Image">
                        </div>
                        <input type="file" name="gbr_prv" class="form-control" id="gbr_prv">
                      </div>
                      <div class="form-group">
                        <label for="eps" class="control-label">Link Video</label>
                        <input type="text" name="emb" id="emb" class="form-control" required>
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
         $(document).on("click", "#edit_upd", function(){
           var no = $(this).data('id');
           var title = $(this).data('title');
           var episode = $(this).data('episode');
           var embed = $(this).data('embed');
           var preview = $(this).data('prv');
           $("#modal-edit #id_upd").val(no);
           $("#modal-edit #title_list").val(title);
           $("#modal-edit #eps").val(episode);
           $("#modal-edit #emb").val(embed);
           $("#modal-edit #pict").attr("src", "assets/img/preview/"+preview);

         })

         $(document).ready(function(e){
                    $("#form").on("submit", (function(e) {
                      e.preventDefault();
                      $.ajax({
                        url : 'models/proses_edit_update.php',
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