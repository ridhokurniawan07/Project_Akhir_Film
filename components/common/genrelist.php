<div class="title-hd">
    <h2>Genre</h2>
</div>
<div class="tabs">
    <ul class="tab-links">
        <li class="active"><a href="#tab1">#Horror</a></li>
        <li><a href="#tab2"> #Drama</a></li>
        <li><a href="#tab3"> #Romance </a></li>
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
                        $film_id = $row['film_id'];
                        $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
                        $average_rating_result = mysqli_query($conn, $average_rating_query);
                        $average_rating_row = mysqli_fetch_assoc($average_rating_result);

                        // Format the average rating to display only one decimal place
                        $average_rating = number_format($average_rating_row['avg_rating'], 1);
                    ?>
                        <div class="slide-it">
                            <div class="flex-wrap-movielist">
                                <div class="movie-item-style-2 movie-item-style-1">
                                    <img src='images/film/<?php echo $row["film_image"]; ?>' alt='Film Image' width="185" height="284">
                                    <div class="hvr-inner">
                                        <a href="moviesingle.php?film_id=<?php echo $row['film_id']; ?>">
                                            Read more <i class="ion-android-arrow-dropright"></i>
                                        </a>
                                    </div>
                                    <div class="mv-item-infor">
                                        <h6><a href="#"><?php echo $row['film_name']; ?></a></h6>
                                        <p class="rate">
                                            <i class="ion-android-star"></i><span><?php echo $average_rating; ?></span> / 10
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
                        $film_id = $row['film_id'];
                        $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
                        $average_rating_result = mysqli_query($conn, $average_rating_query);
                        $average_rating_row = mysqli_fetch_assoc($average_rating_result);

                        // Format the average rating to display only one decimal place
                        $average_rating = number_format($average_rating_row['avg_rating'], 1);
                    ?>
                        <div class="slide-it">
                            <div class="flex-wrap-movielist">
                                <div class="movie-item-style-2 movie-item-style-1">
                                    <img src='images/film/<?php echo $row["film_image"]; ?>' alt='Film Image' width="185" height="284">
                                    <div class="hvr-inner">
                                        <a href="moviesingle.php?film_id=<?php echo $row['film_id']; ?>">
                                            Read more <i class="ion-android-arrow-dropright"></i>
                                        </a>
                                    </div>
                                    <div class="mv-item-infor">
                                        <h6><a href="#"><?php echo $row['film_name']; ?></a></h6>
                                        <p class="rate">
                                            <i class="ion-android-star"></i><span><?php echo $average_rating; ?></span> / 10
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
                        $film_id = $row['film_id'];
                        $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
                        $average_rating_result = mysqli_query($conn, $average_rating_query);
                        $average_rating_row = mysqli_fetch_assoc($average_rating_result);

                        // Format the average rating to display only one decimal place
                        $average_rating = number_format($average_rating_row['avg_rating'], 1);
                    ?>
                        <div class="slide-it">
                            <div class="flex-wrap-movielist">
                                <div class="movie-item-style-2 movie-item-style-1">
                                    <img src='images/film/<?php echo $row["film_image"]; ?>' alt='Film Image' width="185" height="284">
                                    <div class="hvr-inner">
                                    <div class="hvr-inner">
                                        <a href="moviesingle.php?film_id=<?php echo $row['film_id']; ?>">
                                            Read more <i class="ion-android-arrow-dropright"></i>
                                        </a>
                                    </div>
                                    </div>
                                    <div class="mv-item-infor">
                                        <h6><a href="#"><?php echo $row['film_name']; ?></a></h6>
                                        <p class="rate">
                                            <i class="ion-android-star"></i><span><?php echo $average_rating; ?></span> / 10
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