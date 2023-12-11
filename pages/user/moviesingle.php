<?php

if (isset($_SESSION['user_id'])) {
    // Assign the user ID to $userId
    $userId = $_SESSION['user_id'];
} else {
    // Handle the case when the user is not logged in
    // You might redirect them to the login page or handle it in another way
}
// Sertakan file koneksi database
include "./koneksi.php";

// Ambil detail film menggunakan $_GET['film_id']
$movie_id = $_GET['film_id'];
$sql = "SELECT * FROM tb_film WHERE film_id = $movie_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $film_name = $row['film_name'];
    $film_release = $row['film_release'];
    $film_description = $row['film_description'];
    $film_image = $row['film_image'];

    // Ambil ulasan untuk film saat ini dari database
    $film_id = $row['film_id'];
    $reviews_query = "SELECT AVG(r.rating) AS average_rating, COUNT(*) AS total_reviews
          FROM tb_review r
          WHERE r.film_id = $film_id";
    $reviews_result = mysqli_query($conn, $reviews_query);

    // Periksa apakah ada ulasan untuk film tersebut
    if ($reviews_result) {
        $reviews_data = mysqli_fetch_assoc($reviews_result);
        $average_rating = round($reviews_data['average_rating'], 1);
        $total_reviews = $reviews_data['total_reviews'];
    } else {
        // Nilai default jika tidak ada ulasan
        $average_rating = 0;
        $total_reviews = 0;
    }
}
?>

<div class="hero mv-single-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <!-- <h1> movie listing - list</h1>
				<ul class="breadcumb">
					<li class="active"><a href="#">Home</a></li>
					<li> <span class="ion-ios-arrow-right"></span> movie listing</li>
				</ul> -->
            </div>
        </div>
    </div>
</div>
<div class="page-single movie-single movie_single">
    <div class="container">
        <div class="row ipad-width2">
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="movie-img sticky-sb" style="width: 122%;">
                    <img src="images/film/<?php echo $row['film_image']; ?>" alt="" />
                    <div class="movie-btn" style="width: 80%;">
                        <div class="btn-transform transform-vertical red">
                            <div>
                                <a href="#" class="item item-1 redbtn">
                                    <i class="ion-play"></i> Watch Trailer</a>
                            </div>
                            <div>
                                <a href="https://www.youtube.com/embed/o-0hcF97wy0" class="item item-2 redbtn fancybox-media hvr-grow"><i class="ion-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            // ... (Previous code remains unchanged)

            // Fetch reviews for the current film from the database
            include "./koneksi.php";
            $film_id = $row['film_id'];
            $reviews_query = "SELECT AVG(r.rating) AS average_rating, COUNT(*) AS total_reviews
                  FROM tb_review r
                  WHERE r.film_id = $film_id";
            $reviews_result = mysqli_query($conn, $reviews_query);

            // Check if there are reviews for the movie
            if ($reviews_result) {
                $reviews_data = mysqli_fetch_assoc($reviews_result);
                $average_rating = round($reviews_data['average_rating'], 1);
                $total_reviews = $reviews_data['total_reviews'];
            } else {
                // Default values if there are no reviews
                $average_rating = 0;
                $total_reviews = 0;
            }
            ?>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="movie-single-ct main-content">
                    <h1 class="bd-hd">
                        <?php echo $row['film_name']; ?> <span><?php echo date_format(date_create($row["film_release"]), 'Y'); ?></span>
                    </h1>
                    <div class="movie-rate">
                        <div class="rate">
                            <i class="ion-android-star"></i>
                            <p>
                                <span><?php echo $average_rating; ?></span> /10<br />
                                <span class="rv"><?php echo $total_reviews; ?> Reviews</span>
                            </p>
                        </div>
                        <div class="rate-star">
                            <p>Rate This Movie:</p>
                            <?php
                            // Assuming $average_rating is the calculated average rating from the previous code
                            $rounded_average_rating = round($average_rating);

                            // Loop to display stars based on the rounded average rating
                            for ($i = 1; $i <= 10; $i++) {
                                if ($i <= $rounded_average_rating) {
                                    echo '<i class="ion-ios-star"></i>';
                                } else {
                                    echo '<i class="ion-ios-star-outline"></i>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                    <div class="movie-tabs">
                        <div class="tabs">
                            <ul class="tab-links tabs-mv">
                                <li class="active"><a href="#overview">Overview</a></li>
                                <li><a href="#reviews"> Reviews</a></li>
                                <li><a href="#cast"> Cast</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="overview" class="tab active">
                                    <div class="row">
                                        <div class="col-md-8 col-sm-12 col-xs-12">
                                            <p>
                                                <?php echo $row['film_description']; ?>
                                            </p>
                                            <div class="title-hd-sm">
                                                <h4>cast</h4>
                                            </div>
                                            <!-- movie cast -->
                                            <div class="mvcast-item">
                                                <?php
                                                include "./koneksi.php";

                                                // Fetch actors for the current film from the database
                                                $film_id = $row['film_id'];
                                                $actors_query = "SELECT tb_actor.name_actor, tb_actor.foto FROM tb_film_actor
                                                INNER JOIN tb_actor ON tb_film_actor.actor_id = tb_actor.actor_id
                                                WHERE tb_film_actor.film_id = $film_id";
                                                $actors_result = mysqli_query($conn, $actors_query);

                                                while ($actor_row = mysqli_fetch_assoc($actors_result)) {
                                                ?>
                                                    <div class="cast-it">
                                                        <div class="cast-left">
                                                            <img src="images/aktor/<?php echo $actor_row['foto']; ?>" alt="" style="width: 40px; height: 40px;" />
                                                            <a href="#"><?php echo $actor_row['name_actor']; ?></a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-xs-12 col-sm-12">
                                            <div class="sb-it">
                                                <h6>Cast:</h6>
                                                <p>
                                                    <?php
                                                    // Fetch actors for the current film from the database
                                                    $film_id = $row['film_id'];
                                                    $actors_query = "SELECT tb_actor.name_actor FROM tb_film_actor
                                                    INNER JOIN tb_actor ON tb_film_actor.actor_id = tb_actor.actor_id
                                                    WHERE tb_film_actor.film_id = $film_id";
                                                    $actors_result = mysqli_query($conn, $actors_query);

                                                    // Loop through actors to generate the cast list
                                                    while ($actor_row = mysqli_fetch_assoc($actors_result)) {
                                                        echo '<a href="#">' . $actor_row['name_actor'] . '</a>, ';
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Genres:</h6>
                                                <p>
                                                    <?php
                                                    include "./koneksi.php";
                                                    $film_id = $row['film_id'];
                                                    $genres_query = "SELECT tb_genre.genre_name FROM tb_film
                                                    INNER JOIN tb_genre ON tb_film.genre_id = tb_genre.genre_id
                                                    WHERE tb_film.film_id = $film_id";
                                                    $genres_result = mysqli_query($conn, $genres_query);

                                                    // Loop through genres to generate the genre list
                                                    while ($genre_row = mysqli_fetch_assoc($genres_result)) {
                                                        echo '<a href="#">' . $genre_row['genre_name'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>
                                            <div class="sb-it">
                                                <h6>Release Date:</h6>
                                                <p> <?php
                                                    // Assuming $row["film_release"] is in the format YYYY-MM-DD
                                                    $formatted_release_date = date_format(date_create($row["film_release"]), 'F j, Y');
                                                    echo $formatted_release_date;
                                                    ?></p>
                                            </div>
                                            <div class="ads">
                                                <img src="images/uploads/ads1.png" alt="" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="write-review-modal" class="modal-overlay">
                                    <div class="modal-content">
                                        <div class="rv-hd">
                                            <h3>Write a Review</h3>
                                            <a href="#" id="close-write-review" class="close">x</a>
                                        </div>
                                        <div class="mv-user-review-item">
                                            <div class="user-infor">
                                                <div>
                                                    <form id="review-form" action="review.php" method="post">
                                                        <div class="rating">
                                                            <input type="radio" id="star1" name="rating" value="10" />
                                                            <label for="star1">★</label>
                                                            <input type="radio" id="star2" name="rating" value="9" />
                                                            <label for="star2">★</label>
                                                            <input type="radio" id="star3" name="rating" value="8" />
                                                            <label for="star3">★</label>
                                                            <input type="radio" id="star4" name="rating" value="7" />
                                                            <label for="star4">★</label>
                                                            <input type="radio" id="star5" name="rating" value="6" />
                                                            <label for="star5">★</label>
                                                            <input type="radio" id="star6" name="rating" value="5" />
                                                            <label for="star6">★</label>
                                                            <input type="radio" id="star7" name="rating" value="4" />
                                                            <label for="star7">★</label>
                                                            <input type="radio" id="star8" name="rating" value="3" />
                                                            <label for="star8">★</label>
                                                            <input type="radio" id="star9" name="rating" value="2" />
                                                            <label for="star9">★</label>
                                                            <input type="radio" id="star10" name="rating" value="1" />
                                                            <label for="star10">★</label>
                                                        </div>
                                                        <label for="review_title">Name :</label>
                                                        <input type="text" id="review-title" name="review_title" required />
                                                        <label for="review">Your Review:</label>
                                                        <textarea id="review" name="review" rows="5" required></textarea>

                                                        <?php
                                                        // Assuming $row["film_id"] is the current film's ID
                                                        echo '<input type="hidden" name="film_id" value="' . $row["film_id"] . '" />';
                                                        ?>

                                                        <?php
                                                        // Assuming $userId is the user ID (you need to replace this with your actual user authentication logic)
                                                        echo '<input type="hidden" name="user_id" value="' . $userId . '" />';
                                                        ?>
                                                        <button type="submit" class="redbtn" style="margin-top: 10px">
                                                            Submit Review
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                // ... (Previous code remains unchanged)

                                // Fetch reviews for the current film from the database
                                include "./koneksi.php";
                                $film_id = $row['film_id'];
                                $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

                                // Define the number of reviews per page
                                $reviews_per_page = 5;
                                $offset = ($current_page - 1) * $reviews_per_page;

                                // Query to fetch reviews for the current film with pagination
                                $reviews_query = "SELECT r.*, u.username AS user_name, u.gambar AS user_avatar 
                  FROM tb_review r
                  JOIN tb_user u ON r.user_id = u.user_id
                  WHERE r.film_id = $film_id
                  LIMIT $offset, $reviews_per_page";

                                // Execute the query
                                $reviews_result = mysqli_query($conn, $reviews_query);

                                // Check if the query was successful
                                if (!$reviews_result) {
                                    die("Error retrieving reviews: " . mysqli_error($conn));
                                }

                                // Store reviews data in an array
                                $reviews_data = array();
                                while ($review_row = mysqli_fetch_assoc($reviews_result)) {
                                    $reviews_data[] = $review_row;
                                }

                                // Calculate total reviews for the film
                                $total_reviews_query = "SELECT COUNT(*) AS total_reviews FROM tb_review WHERE film_id = $film_id";
                                $total_reviews_result = mysqli_query($conn, $total_reviews_query);
                                $total_reviews_data = mysqli_fetch_assoc($total_reviews_result);
                                $total_reviews = $total_reviews_data['total_reviews'];

                                // Calculate total pages for pagination
                                $total_pages = ceil($total_reviews / $reviews_per_page);
                                ?>

                                <div id="reviews" class="tab review">
                                    <div class="row">
                                        <div class="rv-hd">
                                            <div class="div">
                                                <h3>Related Movies To</h3>
                                                <h2><?php echo $row['film_name']; ?></h2>
                                            </div>
                                            <a href="#" id="write-review-btn" class="redbtn" style="margin-right:20px;" onclick="checkLogin()">Write Review</a>
                                        </div>
                                        <div class="topbar-filter">
                                            <p>Found <span><?php echo $total_reviews; ?> reviews</span> in total</p>
                                        </div>

                                        <?php foreach ($reviews_data as $review_row) : ?>
                                            <div class="mv-user-review-item">
                                                <div class="user-infor">
                                                    <!-- Assuming you have a user profile picture and username in your database -->
                                                    <img src="images/profile/<?php echo $review_row['user_avatar']; ?>" alt="User Avatar" />
                                                    <div>
                                                        <h3><?php echo $review_row['review_title']; ?></h3>
                                                        <!-- Display the star rating based on the stored rating value -->
                                                        <div class="no-star">
                                                            <?php
                                                            for ($i = 0; $i < $review_row['rating']; $i++) {
                                                                echo '<i class="ion-android-star"></i>';
                                                            }
                                                            for ($i = $review_row['rating']; $i < 10; $i++) {
                                                                echo '<i class="ion-android-star last"></i>';
                                                            }
                                                            ?>
                                                        </div>
                                                        <p class="time">
                                                            <?php
                                                            echo date_format(date_create($review_row['tanggal']), 'd F Y');
                                                            ?> by
                                                            <!-- Display the username -->
                                                            <a href="#"><?php echo $review_row['user_name']; ?></a>
                                                        </p>
                                                    </div>
                                                </div>
                                                <p>
                                                    <?php echo $review_row['review']; ?>
                                                </p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>

                                    <div class="topbar-filter">
                                        <label>Reviews per page:</label>
                                        <select>
                                            <option value="range">5 Reviews</option>
                                            <option value="saab">10 Reviews</option>
                                        </select>
                                        <div class="pagination2">
                                            <span>Halaman <?php echo $current_page; ?> dari <?php echo $total_pages; ?>:</span>
                                            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                                                <a <?php if ($i == $current_page) echo 'class="active"'; ?> href="?film_id=<?php echo $movie_id; ?>&page=<?php echo $i; ?>&tab=reviews"><?php echo $i; ?></a>
                                            <?php endfor; ?>
                                            <a href="?film_id=<?php echo $movie_id; ?>&page=<?php echo $current_page + 1; ?>&tab=reviews"><i class="ion-arrow-right-b"></i></a>
                                        </div>

                                    </div>
                                </div>


                                <div id="cast" class="tab">
                                    <div class="row">
                                        <h3>Cast Of</h3>
                                        <h2><?php echo $row['film_name']; ?></h2>
                                        <div class="title-hd-sm">
                                            <h4>Cast</h4>
                                        </div>
                                        <div class="mvcast-item">
                                            <?php
                                            include "./koneksi.php";
                                            $film_id = $row['film_id'];
                                            $actors_query = "SELECT tb_actor.name_actor, tb_actor.foto FROM tb_film_actor
                                            INNER JOIN tb_actor ON tb_film_actor.actor_id = tb_actor.actor_id
                                            WHERE tb_film_actor.film_id = $film_id";

                                            $actors_result = mysqli_query($conn, $actors_query);

                                            // Loop through actors to generate the cast list
                                            while ($actor_row = mysqli_fetch_assoc($actors_result)) {
                                            ?>
                                                <div class="cast-it">
                                                    <div class="cast-left">
                                                        <img src="images/aktor/<?php echo $actor_row['foto']; ?>" alt="" style="width: 40px; height: 40px;" />
                                                        <a href="#"><?php echo $actor_row['name_actor']; ?></a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="slider movie-items">
    <div class="container">
        <h2 style="color:white;">Rekomendasi Untuk Kamu</h2>
        <div class="row">
            <?php
            include "./koneksi.php";
            $query_all = mysqli_query($conn, "SELECT * FROM `tb_film`;");
            ?>


            <div class="slick-multiItemSlider">
                <?php
                // Fetch the genre ID of the current movie
                $current_movie_genre_id = $row['genre_id'];

                // Fetch movies with the same genre, excluding the current movie
                $related_movies_query = "SELECT * FROM `tb_film` WHERE genre_id = $current_movie_genre_id AND film_id != $movie_id";
                $related_movies_result = mysqli_query($conn, $related_movies_query);

                // Loop through related movies and display them in the slider
                while ($related_row = mysqli_fetch_array($related_movies_result)) {
                    $related_film_id = $related_row['film_id'];
                    $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $related_film_id";
                    $average_rating_result = mysqli_query($conn, $average_rating_query);
                    $average_rating_row = mysqli_fetch_assoc($average_rating_result);

                    // Format the average rating to display only one decimal place
                    $average_rating = number_format($average_rating_row['avg_rating'], 1);
                ?>
                    <div class="movie-item">
                            <div class="mv-img">
                                <img src='images/film/<?php echo $related_row["film_image"]; ?>' alt='Film Image' width="185" height="284">
                            </div>
                            <a href="moviesingle.php?film_id=<?php echo $related_row['film_id']; ?>" class="read-more-btn">
                    Read More <i class="ion-android-arrow-dropright"></i>
                        </a>
                        <div class="title-in">
                            <div class="cate">
                                <span class="blue"><a href="#"><?php echo $related_row["film_name"]; ?></a></span>
                            </div>
                            <p class="rate">
                                <i class="ion-android-star"></i><span><?php echo $average_rating; ?></span> / 10
                            </p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>