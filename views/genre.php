<?php 
  include "models/m_genre.php";
  $grn = new Genre($connection);

  include "models/m_list.php";
    $lst = new Alist($connection);
?>

<div class="container-fluid" style="margin-top: 2%;">
    <div class="row">
        <div class="col-sm-8 space">
            <!-- list genre -->
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h5>Genre</h5></strong>
                </div>
                <div class="container-genre" id="container-genre">
                    <?php 
                        $tampil = $grn->tampil();
                        while($data = $tampil->fetch_object()){
                    ?>
                    <a href="?page=list&act=genre&genre=<?php echo $data->title_genre ?>" class="box-genre"><?php echo $data->title_genre ?></a>
                    <?php } ?>
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
                    <a href="?page=anime&anime=<?php echo $data->title_list ?>">
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
        
