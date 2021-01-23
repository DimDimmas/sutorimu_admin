
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
        <button class="btn btn-success add-new" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fa fa-plus-circle" aria-hidden="true"></i> New Genre</button>
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
                <td>
                
                <center><a id="edit_grn" data-bs-toggle="modal" data-bs-target="#edit" 
                data-id="<?php echo $data->id_genre ?>" data-genre="<?php echo $data->title_genre ?>">
                <button type="button" class="btn btn-dark" ><i class="fas fa-pen edit"></i></button>
                </a></center></td>
                <td><center><a href="#"><i class="fa fa-trash delete" aria-hidden="true"></i></a></center></td>
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
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="title_grn" class="control-label">Title Genre</label>
                        <input type="text" name="title_grn" id="title_grn" class="form-control" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="reset" class="btn btn-danger">Reset</button>
                      <input type="submit" value="Submit" name="tambah" class="btn btn-warning">
                    </div>
                  </form>
                  <?php 
                  if(@$_POST['tambah']){
                    $genre = $connection->conn->real_escape_string($_POST['title_grn']);
                    $grn->tambah($genre);
                    echo "<script>alert('Data Berhasil Di tambahkan')</script>";
                    header("location: ?page=genre");
                    
                  }
                ?>
                </div>
            </div>
        </div>

<!-- modal Edit genre -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="tambahModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="tambahModalLabel">Tambah Data Genre</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="form" enctype="multipart/form-data">
                    <div class="modal-body" id="modal-edit">
                      <div class="form-group">
                        <label for="title_grn" class="control-label">Title Genre</label>
                        <input type="hidden" name="id_grn" id="id_grn">
                        <input type="text" name="title_grn" id="title_grn" class="form-control" required>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <input type="submit" value="Submit" name="edit" class="btn btn-warning">
                    </div>
                  </form>
                </div>
            </div>
        </div>

        <script src="assets/js/jquery-3.5.1.min.js"></script>
        <script type="text/javascript">
          $(document).on("click", "#edit_grn", function(){
            var idgrn = $(this).data('id');
            var titlegrn = $(this).data('genre');
            $("#modal-edit #id_grn").val(idgrn);
            $("#modal-edit #title_grn").val(titlegrn);
          })

          $(document).ready(function(e){
                    $("#form").on("submit", (function(e) {
                      e.preventDefault();
                      $.ajax({
                        url : 'models/proses_edit_genre.php',
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