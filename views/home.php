<?php 
  include "models/m_genre.php";
  $grn = new Genre($connection);

  include "models/m_list.php";
  $lst = new Alist($connection);

  include "models/m_update.php";
  $upd = new Update($connection);
?>

<div class="container-fluid" style="margin-top: 2%;">
    <div class="row">
        <div class="col">
            <!-- anime musiman -->
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h5>Anime Winter 2021</h5></strong>
                </div>
                <div class="ongoing-slider">
                    <?php 
                        $tampil = $lst->tampil();
                        while($data = $tampil->fetch_object()){
                    ?>
                    <div class="container-ongoing">
                        <a href="#">
                            <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                            <div class="rating"><i class="fas fa-star"></i> <?php echo $data->rate ?></div>
                            <div class="middle-ongoing">
                                <div class="text-ongoing"><i class="fas fa-play"></i></div>
                            </div>
                            <div class="desc-ongoing"><?php echo $data->title_list ?></div>
                            <div class="status-ongoing"><?php echo $data->status ?></div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <script>
                    $(document).ready(function(){
                        $('.ongoing-slider').slick({
                            dots: false,
                            autoplay: true,
                            arrows: false,
                            infinite: true,
                            speed: 300,
                            slidesToShow: 7,
                            slidesToScroll: 1,
                            responsive: [
                                {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 5,
                                    slidesToScroll: 1,
                                    infinite: true,
                                    dots: false
                                }
                                },
                                {
                                breakpoint: 600,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 1
                                }
                                },
                                {
                                breakpoint: 480,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 1
                                }
                                }
                                // You can unslick at a given breakpoint now by adding:
                                // settings: "unslick"
                                // instead of a settings object
                            ]
                            });
                    });
                </script>
            </div>
            <!-- end anime musiman -->
        </div>

        <div class="col-sm-8 space">
            <!-- anime ongoing -->
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h5>Updates</h5></strong>
                </div>
                <?php
                    $limit   = 10;
                    $page = (isset($_GET['hal']))? $_GET['hal'] : 1;
                    
                    $limit_start = ($page - 1) * $limit;
                    $no = $limit_start + 1; 
                    $tampil = $upd->tampilUpdate($limit_start, $limit);
                    while($data = $tampil->fetch_object()){
                ?>
                <div class="box-item" <?php echo $no ?>>
                    <a href="#">
                        <div class="image-update">
                            <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="preview">
                        </div>
                        <div class="title-update"><?php echo $data->title_list ?></div>
                    </a>
                    <div class="desc-update">
                        Episode : <?php echo $data->episode ?> <br>
                        Genre : <?php echo $data->genre ?> <br>
                        Rate : <?php echo $data->rate ?>
                    </div>
                </div>
                <?php $no++; } ?>
                <ul class="pagination pagination-sm justify-content-center" style="clear: both;">
                    <?php
                    // Buat query untuk menghitung semua jumlah data
                    $sql2 = $pdo->prepare("SELECT COUNT(*) AS jumlah FROM tb_update");
                    $sql2->execute(); // Eksekusi querynya
                    $get_jumlah = $sql2->fetch();
                    
                    $jumlah_page = ceil($get_jumlah['jumlah'] / $limit); // Hitung jumlah halamannya
                    $jumlah_number = 1; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                    $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                    $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                    
                    for($i = $start_number; $i <= $end_number; $i++){
                        $link_active = ($page == $i)? 'page-active' : '';
                    ?>
                        <li class="page-item "><a class='page-link paging <?php echo $link_active; ?>' href="index.php?hal=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!--end anime ongoing -->

            <!-- anime movie -->
            <div class="ongoing space">
                <div class="title-ongoing">
                    <div class="row">
                        <div class="col"><strong><h5>Movie</h5></strong></div>
                    
                        <div class="col"><a href="movie.php" class="button-movie">More</a>
                        </div>
                    </div>
                </div>
                <div class="movie-slider">
                    <?php 
                        $tampil = $lst->movie();
                        while($data = $tampil->fetch_object()){
                    ?>
                    <div class="container-ongoing container-movie">
                        <a href="#">
                            <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="cover" class="image-ongoing">
                            <div class="rating"><i class="fas fa-star"></i> <?php echo $data->rate ?></div>
                            <div class="middle-ongoing middle-movie">
                                <div class="text-ongoing"><i class="fas fa-play"></i></div>
                            </div>
                        <div class="movie-hover"><?php echo $data->title_list ?></div>
                        </a>
                    </div>
                    <?php } ?>
                </div>
                <script>
                    $('.movie-slider').slick({
                        dots: false,
                        autoplay: true,
                        arrows: false,
                        infinite: true,
                        speed: 300,
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        responsive: [
                            {
                            breakpoint: 1024,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1,
                                infinite: true,
                                dots: false
                            }
                            },
                            {
                            breakpoint: 600,
                            settings: {
                                slidesToShow: 3,
                                slidesToScroll: 1
                            }
                            },
                            {
                            breakpoint: 480,
                            settings: {
                                slidesToShow: 2,
                                slidesToScroll: 1
                            }
                            }
                            // You can unslick at a given breakpoint now by adding:
                            // settings: "unslick"
                            // instead of a settings object
                        ]
                        });
                </script>
            </div>
            <!-- end anime movie -->
        </div>

        <div class="col-sm-4 space">
            <!-- genre -->
            <div class="ongoing">
                <div class="title-ongoing">
                    <strong><h6>Genre</h6></strong>
                </div>
                <ul class="ul-genre">
                    <?php 
                        $tampil = $grn->tampil();
                        while($data = $tampil->fetch_object()){
                    ?>
                    <li><a href="#"><i class="fas fa-caret-right"></i> &nbsp; <?php echo $data->title_genre ?> <span class="right count"></span></a></li>
                    <?php } ?>
                </ul>
            </div>
        <!-- end genre -->
        </div>
    </div>
</div>