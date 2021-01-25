<?php 
    include "models/m_list.php";
    include "models/m_update.php";
    $lst = new Alist($connection);
    $upd = new Update($connection);
    
?>
<div class="col">
                    <!-- anime musiman -->
                    <div class="ongoing">
                        <div class="title-ongoing">
                            <strong><h5>Anime Fall 2020</h5></strong>
                        </div>
                        <div class="ongoing-slider">
                            <?php 
                                $tampil = $lst->tampil();
                                while($data = $tampil->fetch_object()){
                            ?>
                            <div class="container-ongoing">
                                <a href="?page=tampil&id=<?php echo $data->id_list ?>">
                                    <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                                    <div class="rating"><i class="fas fa-star"></i> <?php echo $data->rate ?></div>
                                    <div class="middle-ongoing">
                                        <div class="text-ongoing"><i class="fas fa-play"></i></div>
                                    </div>
                                    <div class="desc-ongoing"><?php echo $data->title_list ?></div>
                                    <div class="status-ongoing"><?php echo $data->status ?></div>
                                </a>
                            </div>
                            <?php 
                                }
                            ?>
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
                        $eps = $upd->tampil();
                        $jml = $eps->fetch_object();
                        $tampil = $lst->tampil();
                        while($data = $tampil->fetch_object()){
                    ?>
                        <div class="box-item">
                            <a href="?page=tampil&id=<?php echo $data->id_list ?>">
                                <div class="image-update">
                                    <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="preview">
                                </div>
                                <div class="title-update"><?php echo $data->title_list ?></div>
                            </a>
                            <div class="desc-update">
                                Episode : <?php echo $jml->episode ?> <br>
                                Genre : <?php echo $data->genre ?> <br>
                                Update : 5 Hour Ago
                            </div>
                            
                        </div>
                        <?php 
                            }
                        ?>
                        
                        
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
                                <a href="?page=tampil&id=<?php echo $data->id_list ?>">
                                    <img src="admin/assets/img/<?php echo $data->cover_image ?>" alt="ongoing" class="image-ongoing">
                                    <div class="rating"><i class="fas fa-star"></i> <?php echo $data->rate ?></div>
                                    <div class="middle-ongoing middle-movie">
                                        <div class="text-ongoing"><i class="fas fa-play"></i></div>
                                    </div>
                                <div class="movie-hover"><?php echo $data->title_list ?></div>
                                </a>
                            </div>
                            <?php 
                                }
                            ?>
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

               