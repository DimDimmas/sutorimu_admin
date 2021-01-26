<?php 
  include "models/m_list.php";
  $lst = new Alist($connection);
?>
<div class="container-fluid" style="margin-top: 2%;">
    <div class="row">
        <div class="col-sm space">
            <!-- list genre -->
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h5>Anime List</h5></strong>
                </div> 
                <br>
                <!-- <ul class="pagination pagination-sm justify-content-center" style="clear: both;">
                    <li class="page-item"><a class="page-link paging page-active" href="#">A</a></li>
                    <li class="page-item"><a class="page-link paging" href="#">B</a></li>
                </ul> -->
                <div class="box-list">
                    <?php 
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
                    <div class="container-ongoing">
                        <img src="admin/assets/img/cover/<?php echo $data->cover_image ?>" alt="list" class="image-ongoing">
                        <div class="rating"><i class="fas fa-star"></i> <?php echo $data->rate ?> </div>
                        <div class="middle-ongoing">
                        <div class="text-ongoing"><i class="fas fa-play"></i></div>
                        </div>
                        <div class="desc-ongoing"><?php echo $data->title_list ?></div>
                        <div class="status-ongoing"><?php echo $data->status ?></div>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <!-- end list genre -->
        </div>
    </div>
</div>
