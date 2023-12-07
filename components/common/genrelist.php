<div class="title-hd">
    <h2>Genre</h2>
</div>

<div class="tabs">
    <ul class="tab-links">
        <?php
        include "./koneksi.php";
        $genre_query = mysqli_query($conn, "SELECT * FROM `tb_genre`");
        
        $tabIndex = 1;

        while ($genre = mysqli_fetch_assoc($genre_query)) {
            $genre_id = $genre['genre_id'];
            $genre_name = $genre['genre_name'];
        ?>
            <li <?php echo ($tabIndex === 1) ? 'class="active"' : ''; ?>>
                <a href="#tab<?php echo $genre_id; ?>">#<?php echo $genre_name; ?></a>
            </li>
        <?php
            $tabIndex++;
        }
        ?>
    </ul>

    <br>

    <div class="tab-content">
        <?php
        $genre_query = mysqli_query($conn, "SELECT * FROM `tb_genre`");

        while ($genre = mysqli_fetch_assoc($genre_query)) {
            $genre_id = $genre['genre_id'];

            $query_films = mysqli_query($conn, "SELECT * FROM `tb_film` WHERE genre_id='$genre_id'");
        ?>
            <div id="tab<?php echo $genre_id; ?>" class="tab <?php echo ($genre_id === 1) ? 'active' : ''; ?>" style="margin-left: -16px">
                <div class="row">
                    <div class="slick-multiItem">
                        <?php
                        while ($row = mysqli_fetch_array($query_films)) {
                            $film_id = $row['film_id'];
                            $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
                            $average_rating_result = mysqli_query($conn, $average_rating_query);
                            $average_rating_row = mysqli_fetch_assoc($average_rating_result);

                            $average_rating = number_format($average_rating_row['avg_rating'], 1);
                        ?>
                            <div class="slide-it">
                                <div class="flex-wrap-movielist">
                                    <div class="movie-item-style-2 movie-item-style-1">
                                        <img src='images/film/<?php echo $row["film_image"]; ?>' alt='Film Image' width="185" height="284">
                                        <div class="hvr-inner">
                                            <a href="moviesingle.php?film_id=<?php echo $row['film_id']; ?>">
                                               Read More <i class="ion-android-arrow-dropright"></i>
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
        <?php } ?>
    </div>
</div>

<?php mysqli_close($conn); ?>
