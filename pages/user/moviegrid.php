<?php
$conn = mysqli_connect("localhost", "root", "", "db_film");

// Tentukan jumlah film yang ditampilkan per halaman
$movies_per_page = 8;

// Tentukan halaman saat ini, defaultnya 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Hitung offset untuk query database
$offset = ($page - 1) * $movies_per_page;

// Build the WHERE clause for search conditions
$where_conditions = array();

if (!empty($_GET['search_movie'])) {
    $search_movie = mysqli_real_escape_string($conn, $_GET['search_movie']);
    $where_conditions[] = "LOWER(film_name) LIKE LOWER('%$search_movie%')";
}

// Add conditions for genre and rating range if provided
// Adjust the column names based on your database structure
if (!empty($_GET['genres'])) {
    $genre_ids = implode(",", $_GET['genres']);
    $where_conditions[] = "genre_id IN ($genre_ids)";
}

if (!empty($_GET['rating_range'])) {
    $rating_range = (float)$_GET['rating_range'];
    $where_conditions[] = "film_id IN (SELECT film_id FROM tb_review GROUP BY film_id HAVING ROUND(AVG(rating), 1) = $rating_range)";
}

// Build the WHERE clause
$where_clause = !empty($where_conditions) ? "WHERE " . implode(" AND ", $where_conditions) : "";

// Query database dengan LIMIT dan OFFSET untuk film
if (!empty($where_clause)) {
    $movie_query = mysqli_query($conn, "SELECT * FROM tb_film $where_clause LIMIT $movies_per_page OFFSET $offset");

    // Hitung total jumlah film
    $total_movies_query = mysqli_query($conn, "SELECT COUNT(*) FROM tb_film $where_clause");
    $total_movies = mysqli_fetch_row($total_movies_query)[0];
} else {
    // Jika tidak ada kriteria pencarian, tampilkan semua film
    $movie_query = mysqli_query($conn, "SELECT * FROM tb_film LIMIT $movies_per_page OFFSET $offset");

    // Hitung total jumlah film
    $total_movies_query = mysqli_query($conn, "SELECT COUNT(*) FROM tb_film");
    $total_movies = mysqli_fetch_row($total_movies_query)[0];
}

// Hitung total jumlah halaman
$total_pages = ceil($total_movies / $movies_per_page);
?>
<div class="hero common-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>Movie Listing</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="#">Home</a></li>
                        <li><span class="ion-ios-arrow-right"></span> Movie Listing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-single">
    <div class="container">
        <div class="row ipad-width">
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="topbar-filter">
                    <p>Found <span><?php echo $total_movies; ?> movies</span> in total</p>
                    <a href="moviegrid.php" class="grid"><i class="ion-grid active"></i></a>
                </div>
                <div class="flex-wrap-movielist">
                    <?php
                    while ($row = mysqli_fetch_assoc($movie_query)) {
                        $film_id = $row['film_id'];
                        $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
                        $average_rating_result = mysqli_query($conn, $average_rating_query);
                        $average_rating_row = mysqli_fetch_assoc($average_rating_result);
                        $average_rating = number_format($average_rating_row['avg_rating'], 1);
                    ?>
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src="images/film/<?php echo $row['film_image']; ?>" alt="" />
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
                                <p class="view-count">
                                    <i class="far fa-eye"></i> <?php echo $row['visited_counter']; ?> views
                                </p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="topbar-filter">
                    <label>Movies per page:</label>
                    <select>
                        <option value="range">8 Movies</option>
                        <option value="saab">16 Movies</option>
                    </select>
                    <div class="pagination2">
                        <span>Page <?php echo $page; ?> of <?php echo $total_pages; ?>:</span>
                        <?php
                        for ($i = 1; $i <= $total_pages; $i++) {
                            echo "<a href='moviegrid.php?page=$i'";
                            if ($i == $page) {
                                echo " class='active'";
                            }
                            echo ">$i</a>";
                        }
                        ?>
                        <a href="#"><i class="ion-arrow-right-b"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="searh-form">
                        <h4 class="sb-title">Search for movie</h4>
                        <form class="form-style-1" action="moviegrid.php" method="get">
                            <div class="row">
                                <div class="col-md-12 form-it">
                                    <label>Movie name</label>
                                    <input type="text" name="search_movie" placeholder="Enter keywords" value="<?php echo isset($_GET['search_movie']) ? htmlspecialchars($_GET['search_movie']) : ''; ?>" />
                                </div>
                                <div class="col-md-12 form-it">
                                    <label>Genre</label>
                                    <div class="group-ip">
                                        <select name="genres[]" multiple class="ui fluid dropdown">
                                            <option value="">Enter to filter genres</option>
                                            <?php
                                            // Include your database connection file
                                            include "./koneksi.php";

                                            // Fetch genres from the database
                                            $genres_query = "SELECT * FROM tb_genre";
                                            $genres_result = mysqli_query($conn, $genres_query);

                                            // Loop through genres to generate dropdown options
                                            while ($genre_row = mysqli_fetch_assoc($genres_result)) {
                                                $genre_id = $genre_row['genre_id'];
                                                $genre_name = $genre_row['genre_name'];

                                                // Check if the genre is selected
                                                $selected = (isset($_GET['genres']) && in_array($genre_id, $_GET['genres'])) ? 'selected' : '';

                                                echo "<option value='$genre_id' $selected>$genre_name</option>";
                                            }

                                            // Close the database connection
                                            mysqli_close($conn);
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-12 form-it">
                                    <label>Rating Range</label>
                                    <select name="rating_range">
                                        <option value="">-- Select the rating range below --</option>
                                        <?php
                                        // Loop through ratings from 1 to 10 to generate dropdown options
                                        for ($rating_value = 1; $rating_value <= 10; $rating_value++) {
                                            // Check if the rating value is selected
                                            $selected = (isset($_GET['rating_range']) && $_GET['rating_range'] == $rating_value) ? 'selected' : '';

                                            echo "<option value='$rating_value' $selected>$rating_value</option>";
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="col-md-12">
                                    <input class="submit" type="submit" value="Submit" />
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="ads">
                        <img src="images/uploads/ads1.png" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>