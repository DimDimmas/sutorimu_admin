<?php 
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
      <a class="add-new" data-toggle="modal" href="#ModalAdd">
        <i class="fa fa-plus-circle" aria-hidden="true"></i> Update New Episode
      </a>
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
            <td><?php echo $data->title_list; ?></td>
            <td><?php echo $data->episode; ?></td>
            <td><center><a href="#"><i class="fas fa-pen edit"></i></a></center></td>
            <td><center><a href="#" data-toggle="modal"><i class="fa fa-trash delete" aria-hidden="true" ></i></a></center></td>
          </tr>
          <?php 
            }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Add Modal HTML -->
      <div id="ModalAdd" class="modal fade" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="product_form">
              <div class="modal-header">						
                <h4 class="modal-title">Add Product</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
              </div>
              <div class="modal-body">					
                <div class="form-group">
                  <label>Product Id</label>
                  <input type="text" id="id" name="id" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Product Name</label>
                  <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Stock</label>
                  <input type="number" id="stock" name="stock" class="form-control" required>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" id="category" name="category" class="form-control" required>
                </div>					
              </div>
              <div class="modal-footer">
                <input type="hidden" value="1" name="type">
                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancel">
                <button type="button" class="btn btn-success" id="btn-add">Add</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- ----------------------------- -->
</div>

