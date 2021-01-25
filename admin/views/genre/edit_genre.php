<?php 
  include "models/m_genre.php";
  $grn = new Genre($connection);
?>
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
        <center><h1><strong>Edit Genre</strong></h1></center>
        <br>
        <div class="table-content bg-content">
        <form>
        <?php 
        $id = @$_GET['id'];
        $edit = $grn->edit($id);
        $data = $edit->fetch_object();
        ?>
          <div class="form-group">
            <label for="">Title Genre</label>
            <input type="text" class="form-control" id="genre" placeholder="New Episode" value="<?php echo $data->title_genre; ?>">
          </div>
          <button type="submit" class="btn btn-warning">Submit</button>
        </form>
        </div>
    </div>
    
