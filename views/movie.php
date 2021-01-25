<?php 
    include "models/m_list.php";
    $lst = new Alist($connection);
?>
<div class="col-sm-8 space">
                <!-- list genre -->
                <div class="ongoing">
                    <div class="title-ongoing">
                        <strong><h5>Movie</h5></strong>
                    </div>
                    <div class="container-genre" id="container-genre">
                        <?php 
                            $tampil = $lst->movie();
                            while($data = $tampil->fetch_object()){
                        ?>
                        <div class="box-item recomended movie-container">
                            <a href="#">
                                <div class="image-update">
                                    <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                                    <div class="rating"><i class="fas fa-star"></i> N/A</div>
                                </div>
                                <div class="title-movie"><?php echo $data->title_list ?></div>
                            </a>
                            <div class="desc-movie">
                                Genre : <?php echo $data->genre ?> <br> 
                                <br> <?php echo $data->synopsis ?>
                            </div>
                        </div>
                        <?php 
                            }
                        ?>
                        <ul class="pagination pagination-sm justify-content-center" style="clear: both;">
                            <li class="page-item"><a class="page-link paging page-active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link paging" href="#">2</a></li>
                        </ul>
                    </div>
                </div>
                <!-- end list genre -->
            </div>