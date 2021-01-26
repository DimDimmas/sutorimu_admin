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
                    <strong><h5>Movie</h5></strong>
                </div>
                <div class="container-genre" id="container-genre">
                    <?php 
                        $limit   = 10;
                        $page = (isset($_GET['hal']))? $_GET['hal'] : 1;
                        
                        $limit_start = ($page - 1) * $limit;
                        $no = $limit_start + 1; 
                        $tampil = $lst->tampilList($limit_start, $limit);
                        while($data = $tampil->fetch_object()){
                    ?>
                    <div class="box-item recomended movie-container" <?php echo $no ?>>
                        <a href="#">
                            <div class="image-update">
                                <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                                <div class="rating"><i class="fas fa-star"></i> <?php echo $data->rate ?></div>
                            </div>
                            <div class="title-movie"><?php echo $data->title_list ?></div>
                        </a>
                        <div class="desc-movie">
                            Genre : <?php echo $data->genre ?> <br> <br>
                            <?php
                                $kalimat= $data->synopsis;
                                $huruf_maksimal=300;
                                
                                $result=substr($kalimat, 0, $huruf_maksimal);
                                if(strlen($kalimat) > $huruf_maksimal){
                                echo $result, "...";
                                } else {
                                echo $result;
                                }
                            ?>
                        </div>
                    </div>
                    <?php $no++; } ?>
                    <ul class="pagination pagination-sm justify-content-center" style="clear: both;">
                        <?php
                        // Buat query untuk menghitung semua jumlah data
                        $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tb_update WHERE type = 'Movie'");
                        $sql2->execute(); // Eksekusi querynya
                        $get_jumlah = $sql2->fetch();
                        
                        $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                        $jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                        
                        for($i = $start_number; $i <= $end_number; $i++){
                            $link_active = ($page == $i)? 'page-active' : '';
                        ?>
                            <li class="page-item "><a class='page-link paging <?php echo $link_active; ?>' href="?page=movie?hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
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
                            <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
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