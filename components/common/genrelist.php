<div class="title-hd">
    <h2>Genre</h2>
</div>
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">#Action</a></li>
        <li><a href="#tab2"> #Comedy</a></li>
        <li><a href="#tab3">  #Romance </a></li>
    </ul>
    <br>
    <?php   
    include "./koneksi.php";
    $query_genre1 = mysqli_query($conn, "SELECT * FROM `tb_film`WHERE genre_id='6';");
    ?>
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <div class="row">
                <div class="slick-multiItem">
                    <?php 
                        while ($row = mysqli_fetch_array($query_genre1)) { 
                    ?>
                    <div class="slide-it">
                        <div class="flex-wrap-movielist">
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image'  width="185" height="284">
                            <div class="hvr-inner">
                                <a href="moviesingle.php">
                                    Read more <i class="ion-android-arrow-dropright"></i>
                                </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href="#"><?php echo $row['film_name']; ?></a></h6>
                                <p class="rate">
                                    <i class="ion-android-star"></i><span>8.1</span> /10
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <?php   
        include "./koneksi.php";
        $query_genre2 = mysqli_query($conn, "SELECT * FROM `tb_film`WHERE genre_id='4';");
        ?>
        <div id="tab2" class="tab" style="margin-left: -16px">
            <div class="row">
                <div class="slick-multiItem">
                <?php 
                    while ($row = mysqli_fetch_array($query_genre2)) { 
                ?>
                    <div class="slide-it">
                        <div class="flex-wrap-movielist">
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image'  width="185" height="284">
                            <div class="hvr-inner">
                                <a href="moviesingle.php">
                                    Read more <i class="ion-android-arrow-dropright"></i>
                                </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href="#"><?php echo $row['film_name']; ?></a></h6>
                                <p class="rate">
                                    <i class="ion-android-star"></i><span>8.1</span> /10
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php   
        include "./koneksi.php";
        $query_genre3 = mysqli_query($conn, "SELECT * FROM `tb_film`WHERE genre_id='7';");
        ?>
        <div id="tab3" class="tab" style="margin-left: -16px">
            <div class="row">
                <div class="slick-multiItem">
                <?php 
                    while ($row = mysqli_fetch_array($query_genre3)) { 
                ?>
                <div class="slide-it">
                        <div class="flex-wrap-movielist">
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image'  width="185" height="284">
                            <div class="hvr-inner">
                                <a href="moviesingle.php">
                                    Read more <i class="ion-android-arrow-dropright"></i>
                                </a>
                            </div>
                            <div class="mv-item-infor">
                                <h6><a href="#"><?php echo $row['film_name']; ?></a></h6>
                                <p class="rate">
                                    <i class="ion-android-star"></i><span>8.1</span> /10
                                </p>
                            </div>
                        </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
                
            </div>
        </div>
    </div>
</div>