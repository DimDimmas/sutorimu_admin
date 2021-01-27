<?php 
  include "models/m_list.php";
  $lst = new Alist($connection);
  
  include "models/m_update.php";
  $upd = new Update($connection);

  if(@$_GET['act'] == ''){
  $title = $_GET['anime'];
  $tampil = $lst->show($title);
  $data = $tampil->fetch_object();
?>
<div class="container-fluid space" style="margin-top: 2%;">
    <div class="row">
        <div class="col">
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h4><?php echo $data->title_list ?></h4></strong>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="ongoing">
                            <div class="video-stream">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $data->trailer  ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <!-- <ul class="pagination pagination-sm justify-content-center" style="clear: both;">
                            <li class="page-item"><a class="page-link paging page" href="#">360p</a></li>
                            <li class="page-item"><a class="page-link paging page-active" href="#">480p</a></li>
                            <li class="page-item"><a class="page-link paging" href="#">720p</a></li>
                        </ul> -->
                        <div class="container-sinopsis">
                            <div class="title-ongoing">
                                <h5>Synopsis</h5>
                            </div>
                            <p>
                            <?php echo $data->synopsis ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="ongoing">
                            <div class="title-ongoing">
                                <strong><h6>Info</h6></strong>
                            </div>
                            <div class="box-item recomended">
                                <a href="#">
                                    <div class="image-update image-info">
                                        <img src="admin/assets/img/cover/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                                        <!-- <div class="rating"><i class="fas fa-star"></i> N/A</div> -->
                                    </div>
                                    <div class="title-update title-info" style="margin-top: 0;"><?php echo $data->title_list ?></div>
                                </a>
                                <div class="desc-info">
                                    <table>
                                        <tr>
                                            <td width="70px">Score</td>
                                            <td>:</td>
                                            <td><i class="fa fa-star" aria-hidden="true"></i> <?php echo $data->rate ?></td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>:</td>
                                            <td><?php echo $data->type ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?php echo $data->status ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Episode</td>
                                            <td>:</td>
                                            <td><?php echo $data->total_episode ?></td>
                                        </tr>
                                        <tr>
                                            <td>Aired</td>
                                            <td>:</td>
                                            <td><?php echo $data->aired ?></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>:</td>
                                            <td><?php echo $data->duration ?></td>
                                        </tr>
                                        <tr>
                                            <td>Genre</td>
                                            <td>:</td>
                                            <td><?php echo $data->genre ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#Episode</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $tampil = $upd->show($title);
                                    while($data = $tampil->fetch_object()){
                                ?>
                                <tr>
                                    <td><a href="?page=anime&anime=<?php echo $title ?>&act=episode&episode=<?php echo $data->episode ?>">Episode <?php echo $data->episode ?></a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
  } else if(@$_GET['act'] == 'episode'){
    $episode = $_GET['episode'];

    
  $title = $_GET['anime'];
  $tampil = $lst->show($title);
  $data = $tampil->fetch_object();
?>

<div class="container-fluid space" style="margin-top: 2%;">
    <div class="row">
        <div class="col">
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h4><?php echo $data->title_list ?> Episode <?php echo $episode ?></h4></strong>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <div class="ongoing">
                            <div class="video-stream">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $data->trailer  ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                        <!-- <ul class="pagination pagination-sm justify-content-center" style="clear: both;">
                            <li class="page-item"><a class="page-link paging page" href="#">360p</a></li>
                            <li class="page-item"><a class="page-link paging page-active" href="#">480p</a></li>
                            <li class="page-item"><a class="page-link paging" href="#">720p</a></li>
                        </ul> -->
                        <div class="container-sinopsis">
                            <div class="title-ongoing">
                                <h5>Synopsis</h5>
                            </div>
                            <p>
                            <?php echo $data->synopsis ?>
                            </p>
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="ongoing">
                            <div class="title-ongoing">
                                <strong><h6>Info</h6></strong>
                            </div>
                            <div class="box-item recomended">
                                <a href="#">
                                    <div class="image-update image-info">
                                        <img src="admin/assets/img/cover/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                                        <!-- <div class="rating"><i class="fas fa-star"></i> N/A</div> -->
                                    </div>
                                    <div class="title-update title-info" style="margin-top: 0;"><?php echo $data->title_list ?></div>
                                </a>
                                <div class="desc-info">
                                    <table>
                                        <tr>
                                            <td width="70px">Score</td>
                                            <td>:</td>
                                            <td><i class="fa fa-star" aria-hidden="true"></i> <?php echo $data->rate ?></td>
                                        </tr>
                                        <tr>
                                            <td>Type</td>
                                            <td>:</td>
                                            <td><?php echo $data->type ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td><?php echo $data->status ?></td>
                                        </tr>
                                        <tr>
                                            <td>Total Episode</td>
                                            <td>:</td>
                                            <td><?php echo $data->total_episode ?></td>
                                        </tr>
                                        <tr>
                                            <td>Aired</td>
                                            <td>:</td>
                                            <td><?php echo $data->aired ?></td>
                                        </tr>
                                        <tr>
                                            <td>Duration</td>
                                            <td>:</td>
                                            <td><?php echo $data->duration ?></td>
                                        </tr>
                                        <tr>
                                            <td>Genre</td>
                                            <td>:</td>
                                            <td><?php echo $data->genre ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <table class="table table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#Episode</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $tampil = $upd->show($title);
                                    while($data = $tampil->fetch_object()){
                                ?>
                                <tr>
                                    <td><a href="?page=anime&act=episode&episode=<?php echo $data->episode ?>">Episode <?php echo $data->episode ?></a></td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>