<?php 
  include "models/m_list.php";
    $lst = new Alist($connection);
?>
<div class="container-fluid" style="margin-top: 2%;">
    <div class="row">
        <div class="col-sm-8 space">
            <!-- list genre -->
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h5>Request Anime</h5></strong>
                </div>
                <div class="container-genre">
                    <form>
                        <div class="form-group row">
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="mail" class="form-control" placeholder="Title">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <input type="mail" class="form-control" placeholder="Text Me!">
                                <small id="emailHelp" class="form-text text-muted">This is optional. If you not know the title of the anime, write something related to the anime.</small>
                            </div>
                        </div>
                        <button type="button" class="btn btn-warning" style="float: right; margin: 1%;">Send!</button>
                    </form>
                </div>
            </div>
            <!-- end list genre -->
        </div>

        <div class="col-sm-4 space">
    <!-- recomended -->
    <div class="ongoing">
        <div class="title-ongoing">
            <strong><h6>Recomended</h6></strong>
        </div>
        <?php 
            $tampil = $lst->recommend();
            while($data = $tampil->fetch_object()){
        ?>
        <div class="box-item recomended">
            <a href="#">
                <div class="image-update">
                    <img src="admin/assets/img/cover/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                    <div class="rating"><i class="fas fa-star"></i> <?php echo $data->rate ?></div>
                </div>
                <div class="title-update"><?php echo $data->title_list ?></div>
            </a>
            <div class="desc-update">
                Genre : <?php echo $data->genre ?> <br>
                Type : <?php echo $data->type ?>
            </div>
        </div>
        <?php } ?>
    </div>
<!-- end recomended -->
</div>
    </div>
</div>
        