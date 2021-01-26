<?php 
    include "models/m_list.php";
    include "models/m_update.php";
    $lst = new Alist($connection);
    $upd = new Update($connection);

    $id = @$_GET['id'];
    $tampil = $lst->show($id);
    $data = $tampil->fetch_object();
?>
<div class="col">
                    <div class="ongoing">
                        <div class="title-ongoing">
                            <strong><h4><?php echo $data->title_list; ?> Episode 4</h4></strong>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <div class="ongoing">
                                    <div class="video-stream">
                                        <video width="100%" height="100%" controls>
                                            <source src='assets/video/MKR S2 - 04 [480p].mp4' type='video/MP4'>
                                        </video>
                                    </div>
                                </div>
                                <ul class="pagination pagination-sm justify-content-center" style="clear: both;">
                                    <li class="page-item"><a class="page-link paging page" href="#">360p</a></li>
                                    <li class="page-item"><a class="page-link paging page-active" href="#">480p</a></li>
                                    <li class="page-item"><a class="page-link paging" href="#">720p</a></li>
                                </ul>
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
                                                <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
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
                                        <tr>
                                            <td><a href="#">Episode 1</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Episode 2</a></td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">Episode 3</a></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>