<div class="hero common-hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="hero-ct">
                    <h1>movie listing</h1>
                    <ul class="breadcumb">
                        <li class="active"><a href="#">Home</a></li>
                        <li><span class="ion-ios-arrow-right"></span> movie listing</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
// ... (Previous code remains unchanged)

// Fetch the total number of movies from the database
include "./koneksi.php";
$total_movies_query = "SELECT COUNT(*) as total_movies FROM tb_film";
$total_movies_result = mysqli_query($conn, $total_movies_query);
$total_movies_row = mysqli_fetch_assoc($total_movies_result);
$total_movies = $total_movies_row['total_movies'];
?>
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
                    include "./koneksi.php";
                    $result = mysqli_query($conn, "SELECT * FROM tb_film");
                    while ($row = mysqli_fetch_assoc($result)) {
                        $film_id = $row['film_id'];
                        $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
                        $average_rating_result = mysqli_query($conn, $average_rating_query);
                        $average_rating_row = mysqli_fetch_assoc($average_rating_result);

                        // Format the average rating to display only one decimal place
                        $average_rating = number_format($average_rating_row['avg_rating'], 1);
                    ?>
                        <div class="movie-item-style-2 movie-item-style-1">
                            <img src="images/uploads/<?php echo $row['film_image']; ?>" alt="" />
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
                    <?php } ?>
                </div>
                <div class="topbar-filter">
                    <label>Movies per page:</label>
                    <select>
                        <option value="range">20 Movies</option>
                        <option value="saab">10 Movies</option>
                    </select>
                    <div class="pagination2">
                        <span>Page 1 of 2:</span>
                        <a class="active" href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#">...</a>
                        <a href="#">78</a>
                        <a href="#">79</a>
                        <a href="#"><i class="ion-arrow-right-b"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar">
                    <div class="searh-form">
                        <h4 class="sb-title">Search for movie</h4>
                        <form class="form-style-1" action="#" method="post">
                            <div class="row">
                                <div class="col-md-12 form-it">
                                    <label>Movie name</label>
                                    <input type="text" placeholder="Enter keywords" />
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
                                                echo "<option value='$genre_id'>$genre_name</option>";
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
                                        <option value="range">-- Select the rating range below --</option>
                                        <?php
                                        // Loop through ratings from 1 to 10 to generate dropdown options
                                        for ($rating_value = 1; $rating_value <= 10; $rating_value++) {
                                            echo "<option value='$rating_value'>$rating_value</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-12 form-it">
                                    <label>Release Year</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <select name="release_year_from">
                                                <option value="range">From</option>
                                                <?php
                                                // Include your database connection file
                                                include "./koneksi.php";

                                                // Fetch unique release years with a gap of 5 years from the tb_film table
                                                $release_years_query = "SELECT DISTINCT YEAR(film_release) AS release_year 
                                       FROM tb_film 
                                       WHERE film_release IS NOT NULL 
                                       ORDER BY release_year ASC";
                                                $release_years_result = mysqli_query($conn, $release_years_query);

                                                // Loop through unique release years to generate dropdown options
                                                while ($release_year_row = mysqli_fetch_assoc($release_years_result)) {
                                                    $release_year_value = $release_year_row['release_year'];
                                                    echo "<option value='$release_year_value'>$release_year_value</option>";
                                                }

                                                // Close the database connection
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <select name="release_year_to">
                                                <option value="range">To</option>
                                                <?php
                                                // Reopen the database connection if needed
                                                include "./koneksi.php";

                                                // Re-fetch unique release years with a gap of 5 years from the tb_film table
                                                $release_years_result = mysqli_query($conn, $release_years_query);

                                                // Loop through unique release years to generate dropdown options
                                                while ($release_year_row = mysqli_fetch_assoc($release_years_result)) {
                                                    $release_year_value = $release_year_row['release_year'];
                                                    echo "<option value='$release_year_value'>$release_year_value</option>";
                                                }

                                                // Close the database connection
                                                mysqli_close($conn);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input class="submit" type="submit" value="submit" />
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