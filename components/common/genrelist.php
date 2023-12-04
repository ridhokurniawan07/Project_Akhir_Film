<div class="title-hd">
    <h2>Genre</h2>
    <a href="#" class="viewall">View all <i class="ion-ios-arrow-right"></i></a>
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
    $query_genre1 = mysqli_query($conn, "SELECT * FROM `tb_film`WHERE genre_id='4';");
    ?>
    <div class="tab-content">
        <div id="tab1" class="tab active">
            <div class="row">
                <div class="slick-multiItem">
                    <?php 
                        while ($row = mysqli_fetch_array($query_genre1)) { 
                    ?>
                    <div class="slide-it">
                        <div class="movie-item">
                            <div class="mv-img">
                            <img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image'  width="185" height="284">
                            </div> 
                            <div class="hvr-inner">
                                <a  href="moviesingle.php"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="title-in">
                                <h6><?php echo $row['film_name']; ?></h6>
                                <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        
        <?php   
        include "./koneksi.php";
        $query_genre2 = mysqli_query($conn, "SELECT * FROM `tb_film`WHERE genre_id='6';");
        ?>
        <div id="tab2" class="tab" style="margin-left: -16px">
            <div class="row">
                <div class="slick-multiItem">
                <?php 
                    while ($row = mysqli_fetch_array($query_genre2)) { 
                ?>
                    <div class="slide-it">
                        <div class="movie-item">
                            <div class="mv-img">
                             <img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image'  width="185" height="284">
                            </div> 
                            <div class="hvr-inner">
                                <a  href="moviesingle.php"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="title-in">
                                <h6><?php echo $row['film_name']; ?></h6>
                                <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
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
                        <div class="movie-item">
                            <div class="mv-img">
                             <img src='images/<?php echo $row["film_image"]; ?>' alt='Film Image'  width="185" height="284">
                            </div> 
                            <div class="hvr-inner">
                                <a  href="moviesingle.php"> Read more <i class="ion-android-arrow-dropright"></i> </a>
                            </div>
                            <div class="title-in">
                                <h6><?php echo $row['film_name']; ?></h6>
                                <p><i class="ion-android-star"></i><span>7.4</span> /10</p>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>